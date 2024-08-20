<?php
// Include your database connection file if not included already
require_once('admin/inc/config.php');

// Check if fareId is provided via POST
if (isset($_POST['ticketId'])) {
    $ticketId = $_POST['ticketId'];

    // Create a database connection
    require_once('admin/inc/config.php');

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tickets WHERE ticket_id = ?");
    $stmt->bind_param("i", $ticketId);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Ticket deleted successfully";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If fareId is not provided
    echo "Invalid request. ticketId is missing.";
}
?>
