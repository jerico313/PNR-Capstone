<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['empId'])) {
    // Get the employee ID from the AJAX request
    $empId = $_POST['empId'];

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM employees WHERE employee_id = $empId";

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Employee deleted successfully";
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    // Invalid request
    echo "Invalid request";
}
?>
