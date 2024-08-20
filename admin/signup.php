<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role']; // Assuming you have a 'role' field in your form
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validate the data
    if ($password != $confirmpassword) {
        // Password and confirm password do not match, show an error message
        echo "<script>alert('Password and confirm password do not match'); window.location = 'reg_employee.php';</script>";
    } else {
        // Passwords match, proceed with email validation
        // Check if the email already exists in the database
        $conn = new mysqli("localhost", "root", "", "pnr");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $emailCheck = "SELECT * FROM employees WHERE emp_email = '$email'";
        $result = $conn->query($emailCheck);

        if ($result->num_rows > 0) {
            // Email already exists, show an error message
            echo "<script>alert('Email already exists. Please use a different email.'); window.location = 'reg_employee.php';</script>";
        } else {
            // Email is unique, proceed with database insertion
            $sql = "INSERT INTO employees (emp_firstname, emp_lastname, emp_email, role, password) VALUES ('$firstname', '$lastname', '$email', '$role', '$password')";
            
            // Perform database insertion
            if ($conn->query($sql) === TRUE) {
                // Record added successfully, show JavaScript alert
                echo "<script>alert('Record added successfully'); window.location = 'reg_employee.php';</script>";
            } else {
                // Error occurred, show JavaScript alert with the error message
                echo '<script>alert("Error: ' . $conn->error . '");</script>';
            }
        }

        $conn->close();
    }
}
?>

