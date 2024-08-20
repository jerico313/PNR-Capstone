<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ticketId'])) {
    // Get the station ID from the AJAX request
    $ticketId = $_POST['ticketId'];

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM tickets WHERE ticket_id = $ticketId";

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Station deleted successfully";
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
