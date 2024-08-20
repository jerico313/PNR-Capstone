<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['trainId'])) { // Change variable name from stationId to trainId
    // Get the train ID from the AJAX request
    $trainId = $_POST['trainId']; // Change variable name from stationId to trainId

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM trains WHERE train_id = $trainId"; // Change table name from stations to trains

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Train deleted successfully";
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
