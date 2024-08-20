<?php
session_start();
$email = "";
require 'vendor/autoload.php'; // Include Composer autoloader
include "admin/inc/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify_code"])) {
    // Generate a random verification code
    $verification_code = mt_rand(100000, 999999);

    // Update the verification_code column in your accounts table (replace 'your_database_connection' with your actual connection code)
    $email = $_POST["email"];

    // Check if the email exists in the database
    $check_email_sql = "SELECT id FROM accounts WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);

    if (mysqli_num_rows($check_email_result) == 0) {
        // Email not found in the database, show alert
        echo "<script>alert('Email not found. Please enter a valid email address.'); window.location = 'forgot_pass.php';</script>";
    } else {
        // Email found, proceed with the verification code update and sending
        $update_query = "UPDATE accounts SET verification_code = '$verification_code' WHERE email = '$email'";
        
        // Execute your update query here
        if (mysqli_query($conn, $update_query)) {
            // Send email with verification code using SMTP (replace placeholder values)
            $to = $email;
            $subject = "Verification Code for Forgot Password";
            $message = "Your verification code is: $verification_code";
            $headers = "From: jericobuncag0@gmail.com"; // Replace with your email

            // Use PHPMailer or another library for SMTP mail sending
            require 'vendor/autoload.php'; // Include PHPMailer library

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'jericobuncag0@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'zswmpiantsrswvci'; // Replace with your SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('jericobuncag0@gmail.com', 'PNR'); // Replace with your email and name
            $mail->addAddress($to);

            $mail->Subject = $subject;
            $mail->Body = $message;

            if ($mail->send()) {
                // Email sent successfully
                echo "Verification code sent to your email. Check your inbox.";
                $_SESSION['email'] = $email;
                // Redirect to verify_change_pass.php
                header("Location: verify_change_pass.php?email=$email");
                exit();
            } else {
                // Email sending failed
                echo "Error sending verification code. Please try again later.";
            }
        } else {
            // Error updating verification code in the database
            echo "Error updating verification code. Please try again later.";
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify"])) {
    $email = $_SESSION['email']; // Assuming you stored the email in the session during the verification code sending process
    $verification_code = $_POST['verification_code'];

    // Check if the verification code matches the one stored in the database
    $check_code_sql = "SELECT id FROM accounts WHERE email = '$email' AND verification_code = '$verification_code'";
    $check_code_result = mysqli_query($conn, $check_code_sql);

    if (mysqli_num_rows($check_code_result) > 0) {
        // Verification code matches, generate a temporary password
        $temporary_password = generateTemporaryPassword();

        // Update the password column in the accounts table
        $hashed_temporary_password = password_hash($temporary_password, PASSWORD_DEFAULT);
        $update_password_sql = "UPDATE accounts SET password = '$hashed_temporary_password' WHERE email = '$email'";
        
        if (mysqli_query($conn, $update_password_sql)) {
            // Send the temporary password to the user's email
            sendTemporaryPasswordEmail($email, $temporary_password);

            // Redirect to a success page or login page
            header("Location: password_sent_success.php");
            exit();
        } else {
            // Error updating password
            echo "Error updating password. Please try again later.";
        }
    } else {
        // Verification code does not match
        echo "<script>alert('Invalid verification code. Please try again.'); history.go(-1);</script>";
    }
}

function generateTemporaryPassword($length = 8) {
    // Generate a random temporary password
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $temporary_password = '';

    for ($i = 0; $i < $length; $i++) {
        $temporary_password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $temporary_password;
}

function sendTemporaryPasswordEmail($to, $temporary_password) {
    // Send email with temporary password using SMTP (replace placeholder values)
    $subject = "Temporary Password for Password Reset";
    $message = "Your temporary password is: $temporary_password";
    $headers = "From: your_email@example.com"; // Replace with your email

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'jericobuncag0@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'zswmpiantsrswvci'; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('jericobuncag0@gmail.com', 'PNR'); // Replace with your email and name
    $mail->addAddress($to);

    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        // Email sent successfully
        echo "Temporary password sent to your email. Check your inbox.";
    } else {
        // Email sending failed
        echo "Error sending temporary password. Please try again later.";
    }
}
?>