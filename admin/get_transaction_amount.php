<?php
// get_transaction_amount.php

require_once('inc/config.php');

// Get the selected date from the AJAX request
$date = $_GET['date'];

// Establish a database conn
include("inc/config.php");

// Fetch the total amount for the selected date with status "payment"
$queryAmount = "SELECT SUM(amount) as totalAmount FROM transactions WHERE DATE(date) = '$date' AND status = 'Payment'";
$resultAmount = mysqli_query($conn, $queryAmount);

// Check if the query was successful
if ($resultAmount) {
    $rowAmount = mysqli_fetch_assoc($resultAmount);
    $totalAmount = $rowAmount['totalAmount'];

    // Return the total amount as JSON
    echo json_encode(['totalAmount' => $totalAmount]);
} else {
    die("Error in the amount query: " . mysqli_error($conn));
}

// Close the database conn
mysqli_close($conn);
?>
