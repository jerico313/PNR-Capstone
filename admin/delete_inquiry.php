<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inquiryId'])) { // Change variable name from stationId to inquiryId
    // Get the train ID from the AJAX request
    $inquiryId = $_POST['inquiryId']; // Change variable name from stationId to inquiryId

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM inquiry WHERE inquiry_id = $inquiryId"; // Change table name from stations to trains

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
