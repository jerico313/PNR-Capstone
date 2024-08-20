<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complaintsId'])) { // Change variable name from stationId to complaintsId
    // Get the train ID from the AJAX request
    $complaintsId = $_POST['complaintsId']; // Change variable name from stationId to complaintsId

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM comments_complaints WHERE complaints_id = $complaintsId"; // Change table name from stations to trains

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Inquiry deleted successfully";
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
