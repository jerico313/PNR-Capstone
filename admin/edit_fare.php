<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fareId = $_POST['editFareId'];
    $origin = $_POST['editOrigin'];
    $destination = $_POST['editDestination'];
    $route = $origin . ' - ' . $destination;
    $fareAmount = $_POST['editFare'];
    $fareDirection = $_POST['editFareDirection'];

    // Validate the data

    // Proceed with database update
    include("inc/config.php");

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE faretable SET route=?, fare=?, Direction=? WHERE fare_id=?");
    $stmt->bind_param("sssi", $route, $fareAmount, $fareDirection, $fareId);

    // Perform database update
    if ($stmt->execute()) {
        // Record updated successfully
        echo "<script>alert('Fare updated successfully'); window.location = 'fare.php';</script>";
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
