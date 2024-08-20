<?php
// Include the database configuration file
include "inc/config.php";

// Sign-up logic
if (isset($_POST['signup'])) {
    $firstname = $_POST['adm_firstname'];
    $lastname = $_POST['adm_lastname'];
    $email = $_POST['adm_email'];
    //$phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email address already exists in the database
    $check_email_sql = "SELECT admin_id FROM admin WHERE adm_email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);


    if (mysqli_num_rows($check_email_result) > 0) {
        echo "<script>alert('Email address already exists. Please use a different one.'); window.location = 'signup.php';</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location = 'signup.php';</script>";
    } else {
        // Hash the password (you should use a more secure method)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the 'accounts' table
        // Insert data into the 'accounts' table with a default profile picture
        $insert_sql = "INSERT INTO admin (adm_firstname, adm_lastname, adm_email, password, profile_picture)
        VALUES ('$firstname', '$lastname', '$email', '$hashed_password', 'default.jpg')";

        if (mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('Sign-up successful!'); window.location = 'admin_signin.php';</script>";
        } else {
            echo "<script>alert('Error: " . $insert_sql . "\\n" . mysqli_error($conn) . "'); window.location = 'admin_signin.php';</script>";
        }
    }
}

// Sign-in using email
if (isset($_POST['signin'])) {
    $email = $_POST['adm_email'];
    $password = $_POST['password'];

    // Retrieve the hashed password and user details for the given email address
    $sql = "SELECT admin_id, adm_firstname, adm_lastname, password FROM admin WHERE adm_email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Start a session and store user details
            session_start();
            $_SESSION['user_id'] = $row['admin_id'];
            $_SESSION['firstname'] = $row['adm_firstname'];
            $_SESSION['lastname'] = $row['adm_lastname'];
            $_SESSION['profile_picture'] = $row['profile_picture'];

            // Redirect to the welcome page
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect email or password.'); window.location = 'admin_signin.php';</script>";
        }
    } else {
        echo "<script>alert('Account not found.'); window.location = 'admin_signin.php';</script>";
    }
}

?>