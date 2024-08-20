<?php
// Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add logic to reset the status column in your database
    include("../admin/inc/config.php");

    $sql = "UPDATE pandacan SET status = 'On Time'";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_pandacan SET status = 'On Time'";
    $result = $conn->query($sql);

    $conn->close();

    // Send a JSON response indicating success
    echo json_encode(['success' => true]);
} else {
    // Send a JSON response indicating failure
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
