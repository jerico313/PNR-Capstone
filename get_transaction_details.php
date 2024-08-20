<?php
// get_transaction_details.php

// Include your database connection file if not included already
require_once('admin/inc/config.php');

// Check if transactionId is set in POST data
if(isset($_POST['transactionId'])) {
    $transactionId = $_POST['transactionId'];

    // Fetch date, amount, and status based on transactionId
    $sql = "SELECT date, amount, status FROM transactions WHERE transaction_id = $transactionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check the status and customize the message accordingly
        if ($row['status'] == "Payment") {
            $message = "You have paid ₱" . $row['amount'] . " to purchase a ticket on " . $row['date'];
        } elseif ($row['status'] == "Cash In") {
            // Customize the Cash in message (you can change this part)
            $message = "You have cashed in ₱" . $row['amount'] . " on " . $row['date'];
        } else {
            // Default message for other statuses
            $message = "Transaction status: " . $row['status'];
        }

        // Output the status and message
        echo "<p style='text-align:center;'><strong>" . $row['status'] . "</strong></p>";
        echo "<hr>";
        echo "<p style='text-align:center;'>" . $message . "</p>";
    } else {
        echo "No details found for transaction ID: " . $transactionId;
    }

    $conn->close();
} else {
    echo "Error: Transaction ID not provided.";
}
?>
