<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transactionId'])) {
    include("admin/inc/config.php");

    // Convert transactionId to integer to prevent SQL injection
    $transactionId = (int)$_POST['transactionId'];

    // Use prepared statement to delete the transaction
    $sql = "DELETE FROM transactions WHERE transaction_id = ?";
    
    // Initialize prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $transactionId);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    if ($result) {
        echo 'Transaction deleted successfully';
    } else {
        echo 'Error deleting transaction';
    }
} else {
    echo 'Invalid request';
}
?>
