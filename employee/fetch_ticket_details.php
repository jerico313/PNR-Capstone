<?php
// fetch_ticket_details.php

// Include the database configuration file
require_once('../admin/inc/config.php');

// Get the scanned ticket number from the query parameters
$ticket_id = $_GET['ticket_id'];

// Fetch ticket details from the database
$sql = "SELECT * FROM tickets WHERE ticket_id = '$ticket_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Ticket not found']);
}

$conn->close();
?>
