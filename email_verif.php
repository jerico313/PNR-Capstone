<?php
session_start();
$email = "";
require 'vendor/autoload.php'; // Include Composer autoloader
include "admin/inc/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate a random verification code
function generateVerificationCode($length = 6) {
    return substr(str_shuffle("0123456789"), 0, $length);
}

// Function to sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// Function to send verification email
function sendVerificationEmail($email, $verification_code) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jericobuncag0@gmail.com';
        $mail->Password   = 'zswmpiantsrswvci';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('jericobuncag0@gmail.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Code';

        // Improved email body with HTML and CSS
        $mail->Body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f4f4f4;
                        text-align: center;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        text-align:center;
                    }
                    h1 {
                        color: #333333;
                    }
                    p {
                        color: #555555;
                        line-height: 1.5;
                    }
                    .verification-code {
                        font-size: 24px;
                        font-weight: bold;
                        color: #174793;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Email Verification Code</h1>
                    <p>Thank you for signing up! Please use the following verification code:</p>
                    <p class='verification-code'>$verification_code</p>
                </div>
            </body>
            </html>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("Error sending verification email: " . $e->getMessage(), 0);
        return false;
    }
}

// Sign-up logic with email verification code
if (isset($_POST['signup'])) {
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $password = sanitizeInput($_POST['password']);
    $confirm_password = sanitizeInput($_POST['confirm_password']);

    // Check if the email address already exists in the database
    $check_email_sql = "SELECT id FROM accounts WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);

    // Check if the phone number already exists in the database
    $check_phone_sql = "SELECT id FROM accounts WHERE phone = '$phone'";
    $check_phone_result = mysqli_query($conn, $check_phone_sql);

    if (mysqli_num_rows($check_email_result) > 0) {
        echo "<script>alert('Email address already exists. Please use a different one.'); window.location = 'signup.php';</script>";
        exit();
    } elseif (mysqli_num_rows($check_phone_result) > 0) {
        echo "<script>alert('Phone number already exists. Please choose a different one.'); window.location = 'signup.php';</script>";
        exit();
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location = 'signup.php';</script>";
        exit();
    } else {
        // Hash the password (you should use a more secure method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Generate a random verification code
        $verification_code = generateVerificationCode();

        // Insert data into the 'accounts' table with the verification code
        $insert_sql = "INSERT INTO accounts (firstname, lastname, email, phone, password, verification_code, profile_picture)
        VALUES ('$firstname', '$lastname', '$email', '$phone', '$hashed_password', '$verification_code', 'default.jpg')";

        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['email'] = $email;
            // Send verification email with the code
            if (sendVerificationEmail($email, $verification_code)) {
                // Redirect to verify.php after successful sign-up
                header("Location: verify.php");
                exit();
            } else {
                echo "<script>alert('Sign-up successful, but error sending verification email. Please try again.'); window.location = 'signup.php';</script>";
            }
        } else {
            echo "<script>alert('Error: " . $insert_sql . "\\n" . mysqli_error($conn) . "'); window.location = 'signup.php';</script>";
        }
    }
}

// Verification logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    $verification_code = sanitizeInput($_POST['verification_code']);
    $email = sanitizeInput($_SESSION['email']); // Make sure you have the email stored in the session

    // Check if the verification code matches the one stored in the database
    $check_code_sql = "SELECT id FROM accounts WHERE email = '$email' AND verification_code = '$verification_code'";
    $check_code_result = mysqli_query($conn, $check_code_sql);

    if (!$check_code_result) {
        // Debugging: Output SQL error
        echo "SQL Error: " . mysqli_error($conn);
    }

    if (mysqli_num_rows($check_code_result) > 0) {
        // Update the user status to mark them as verified (you can implement this in your database)
        $update_status_sql = "UPDATE accounts SET verified = 1 WHERE email = '$email'";
        mysqli_query($conn, $update_status_sql);

        echo "<script>alert('Email verification successful! You can now log in.'); window.location = 'login.php';</script>";
    } else {
        echo "<script>alert('Incorrect verification code. Please try again.'); history.go(-1);</script>";
    }
} else {
    // Redirect to the verification page if accessed directly without a POST request
    header("Location: verify.php");
    exit();
}
?>
