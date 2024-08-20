<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $editPassengerId = $_POST['editPassengerId'];
    $editFirstName = $_POST['editFirstName'];
    $editLastName = $_POST['editLastName'];
    $editEmail = $_POST['editEmail'];

    // Validate the data (you may want to add more validation)
    if (empty($editPassengerId) || empty($editFirstName) || empty($editLastName) || empty($editEmail)) {
        // Handle validation error
        echo "Error: All fields are required.";
    } else {
        // Update the passenger record in the database
        include("inc/config.php");

        $sql = "UPDATE accounts SET
                firstname = '$editFirstName',
                lastname = '$editLastName',
                email = '$editEmail'
                WHERE id = $editPassengerId";

        if ($conn->query($sql) === TRUE) {
            // Record updated successfully
            echo "<script>alert('Passenger updated successfully'); window.location = 'reg_passenger.php';</script>";
        } else {
            // Error occurred
            echo "Error updating passenger: " . $conn->error;
        }

        $conn->close();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
