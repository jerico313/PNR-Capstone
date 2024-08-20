<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['passengerId'])) {
    // Get the passenger ID from the AJAX request
    $passengerId = $_POST['passengerId'];

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM accounts WHERE id = $passengerId";

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Passenger deleted successfully";
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
