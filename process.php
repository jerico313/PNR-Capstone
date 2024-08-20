<?php
// Include the database configuration file
include "admin/inc/config.php";

// Sign-up logic
if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email address already exists in the database
    $check_email_sql = "SELECT id FROM accounts WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);

    // Check if the phone number already exists in the database
    $check_phone_sql = "SELECT id FROM accounts WHERE phone = '$phone'";
    $check_phone_result = mysqli_query($conn, $check_phone_sql);

    if (mysqli_num_rows($check_email_result) > 0) {
        echo "<script>alert('Email address already exists. Please use a different one.'); window.location = 'signup.php';</script>";
    } elseif (mysqli_num_rows($check_phone_result) > 0) {
        echo "<script>alert('Phone number already exists. Please choose a different one.'); window.location = 'signup.php';</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location = 'signup.php';</script>";
    } else {
        // Hash the password (you should use a more secure method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the 'accounts' table
        // Insert data into the 'accounts' table with a default profile picture
        $insert_sql = "INSERT INTO accounts (firstname, lastname, email, phone, password, profile_picture)
        VALUES ('$firstname', '$lastname', '$email', '$phone', '$hashed_password', 'default.jpg')";

        if (mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('Sign-up successful!'); window.location = 'login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $insert_sql . "\\n" . mysqli_error($conn) . "'); window.location = 'signup.php';</script>";
        }
    }
}

// Sign-in using phone number
if (isset($_POST['signin'])) {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Retrieve the hashed password, user details, and verified status for the given phone number
    $sql = "SELECT id, firstname, lastname, password, verified FROM accounts WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            if ($row['verified'] == 1) { // Check if the account is verified
                // Start a session and store user details
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['profile_picture'] = $row['profile_picture'];

                // Redirect to the welcome page
                header("Location: welcome.php");
                exit();
            } else {
                echo "<script>alert('Account not verified.'); window.location = 'login.php';</script>";
            }
        } else {
            echo "<script>alert('Incorrect phone or password.'); window.location = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Account not found.'); window.location = 'login.php';</script>";
    }
}

// Sign-in using email
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the hashed password, user details, and verified status for the given email address
    $sql = "SELECT id, firstname, lastname, password, verified FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            if ($row['verified'] == 1) { // Check if the account is verified
                // Start a session and store user details
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['profile_picture'] = $row['profile_picture'];

                // Redirect to the welcome page
                header("Location: welcome.php");
                exit();
            } else {
                echo "<script>alert('Account not verified.'); window.location = 'login-email.php';</script>";
            }
        } else {
            echo "<script>alert('Incorrect email or password.'); window.location = 'login-email.php';</script>";
        }
    } else {
        echo "<script>alert('Account not found.'); window.location = 'login-email.php';</script>";
    }
}

?>