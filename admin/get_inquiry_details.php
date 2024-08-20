<?php
// get_inquiry_details.php

// Include your database connection file if not included already
require_once('inc/config.php');

// Check if inquiryId is set in POST data
if(isset($_POST['inquiryId'])) {
   $inquiryId = $_POST['inquiryId'];

   // Fetch subject, message, and date based on inquiryId
   $sql = "SELECT subject, message, date FROM inquiry WHERE inquiry_id = $inquiryId";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
      echo "<p><strong>Subject:</strong> " . $row['subject'] . "</p>";
      echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
   } else {
      echo "No details found for inquiry ID: " . $inquiryId;
   }

   $conn->close();
} else {
   echo "Error: Inquiry ID not provided.";
}
?>
