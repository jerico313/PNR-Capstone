<?php
// update_ticket_status.php

// Include the database configuration file
require_once('../admin/inc/config.php');

// Get the ticket number from the query parameters
$ticket_id = $_GET['ticket_id'];

// Update ticket status in the database
$sql = "UPDATE tickets SET status = 'Ticket Already Used' WHERE ticket_id = '$ticket_id'";
if ($conn->query($sql) === TRUE) {
    echo "Ticket status updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
