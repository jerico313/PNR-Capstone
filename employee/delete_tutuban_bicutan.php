<?php
// Include your database connection file if not included already
require_once('../admin/inc/config.php');

// Check if scheduleId is provided via POST
if (isset($_POST['scheduleId'])) {
    $scheduleId = $_POST['scheduleId'];

    // Create a database connection
    include("../admin/inc/config.php");

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM tutuban_bicutan WHERE schedule_id = ?");
    $stmt->bind_param("i", $scheduleId);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        // Error occurred during deletion
        $response = array('success' => false, 'message' => 'Error: ' . $stmt->error);
        echo json_encode($response);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If scheduleId is not provided
    $response = array('success' => false, 'message' => 'Invalid request. ScheduleId is missing.');
    echo json_encode($response);
}
?>
