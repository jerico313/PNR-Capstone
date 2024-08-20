<?php
// get_train_status.php
require_once('admin/inc/config.php');

$trainId = $_GET['trainId'] ?? '0'; // Default to '0' or another invalid ID if not provided

// Fetch current status and train number from the database
$query = "SELECT tsu.status, t.train_no 
          FROM train_status_updates tsu 
          INNER JOIN trains t ON tsu.train_id = t.train_id 
          WHERE tsu.train_id = ? 
          ORDER BY tsu.timestamp DESC 
          LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $trainId);
$stmt->execute();
$result = $stmt->get_result();

// Check if a status and train number were actually found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentStatus = $row['status'];
    $trainNo = $row['train_no'];
} else {
    // Log this situation for debugging
    error_log("No status found for train_id: " . $trainId);
    $currentStatus = 'No current status';
    $trainNo = 'Unknown'; // Default train number
}

echo json_encode(['success' => true, 'currentStatus' => $currentStatus, 'train_no' => $trainNo]);
?>
