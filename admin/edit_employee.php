<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $editEmployeeId = $_POST['editEmployeeId'];
    $editFirstName = $_POST['editFirstName'];
    $editLastName = $_POST['editLastName'];
    $editEmail = $_POST['editEmail'];
    $editRole = $_POST['editRole'];
    $editPassword = $_POST['editPassword'];

    // Check if the password input is empty or readonly
    if (empty($editEmployeeId) || empty($editFirstName) || empty($editLastName) || empty($editEmail) || empty($editRole)) {
        // Handle validation error
        echo "Error: All fields are required.";
    } else {
        // Check if the password input is not readonly
        if (!empty($editPassword)) {
            // Hash the password
            $hashedPassword = password_hash($editPassword, PASSWORD_DEFAULT);
            
            // Update the employee record in the database with the new hashed password
            include("inc/config.php");

            $sql = "UPDATE employees SET
                    emp_firstname = '$editFirstName',
                    emp_lastname = '$editLastName',
                    emp_email = '$editEmail',
                    role = '$editRole',
                    password = '$hashedPassword'
                    WHERE employee_id = $editEmployeeId";
        } else {
            // Update the employee record in the database without changing the password
            include("inc/config.php");

            $sql = "UPDATE employees SET
                    emp_firstname = '$editFirstName',
                    emp_lastname = '$editLastName',
                    emp_email = '$editEmail',
                    role = '$editRole'
                    WHERE employee_id = $editEmployeeId";
        }

        if ($conn->query($sql) === TRUE) {
            // Record updated successfully
            echo "<script>alert('Employee updated successfully'); window.location = 'reg_employee.php';</script>";
        } else {
            // Error occurred
            echo "Error updating employee: " . $conn->error;
        }

        $conn->close();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
