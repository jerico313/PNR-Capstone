<?php
require_once('inc/db.php');
header('Content-Type: application/json');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['employee_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in.']);
    exit;
}

// Decode JSON from the request body
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); // Convert JSON into array

// Validate the input
if (!isset($input['trainId']) || !isset($input['status'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid train ID or status.']);
    exit;
}

$trainId = $input['trainId'];
$status = $input['status'];
$employeeId = $_SESSION['employee_id'];

// Check if the employee is assigned to the train they're trying to update
if (!isEmployeeAssignedToTrain($employeeId, $trainId, $conn)) {
    echo json_encode(['success' => false, 'message' => 'Employee not assigned to this train.']);
    exit;
}

// Log the action for debugging
error_log("Employee ID $employeeId is attempting to update train ID $trainId with status: $status");

// Prepare the SQL statement
$stmt = mysqli_prepare($conn, "INSERT INTO train_status_updates (train_id, status, updated_by_employee_id) VALUES (?, ?, ?)");

// Bind parameters to the prepared statement as integers and strings respectively
mysqli_stmt_bind_param($stmt, "isi", $trainId, $status, $employeeId);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => true, 'message' => 'Status updated successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update status.', 'error' => mysqli_stmt_error($stmt)]);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Function to check if an employee is assigned to update a specific train
function isEmployeeAssignedToTrain($employeeId, $trainId, $conn) {
    $query = "SELECT 1 FROM trains WHERE train_id = ? AND current_employee_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $trainId, $employeeId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $isAssigned = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);
    return $isAssigned;
}
?>
