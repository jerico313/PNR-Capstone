<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Check if fareId is provided via POST
if (isset($_POST['fareId'])) {
    $fareId = $_POST['fareId'];

    // Create a database connection
    include("inc/config.php");

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM faretable WHERE fare_id = ?");
    $stmt->bind_param("i", $fareId);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Fare deleted successfully";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If fareId is not provided
    echo "Invalid request. FareId is missing.";
}
?>
