<?php
require_once('inc/db.php'); // Adjust the path as needed

header('Content-Type: application/json');

if (isset($_GET['trainId']) && !empty($_GET['trainId'])) {
    // Fetching the current status for a specific train
    $trainId = intval($_GET['trainId']);
    $statusQuery = "SELECT status FROM train_status_updates WHERE train_id = ? ORDER BY timestamp DESC LIMIT 1";
    $statusStmt = $conn->prepare($statusQuery);
    $statusStmt->bind_param("i", $trainId);
    $statusStmt->execute();
    $statusResult = $statusStmt->get_result();
    $statusRow = $statusResult->fetch_assoc();

    echo json_encode(['success' => true, 'currentStatus' => $statusRow['status'] ?? 'No current status']);
    $statusStmt->close();
} else {
    // Fetching all trains
    $trainsQuery = "SELECT train_id, train_no FROM trains";
    $trainsResult = $conn->query($trainsQuery);
    $trains = [];

    while ($trainRow = $trainsResult->fetch_assoc()) {
        $trains[] = $trainRow;
    }

    echo json_encode($trains);
}

$conn->close();
?>