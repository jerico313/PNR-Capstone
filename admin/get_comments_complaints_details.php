<?php
// get_inquiry_details.php

// Include your database connection file if not included already
require_once('inc/config.php');

// Check if complaintsId is set in POST data
if(isset($_POST['complaintsId'])) {
   $complaintsId = $_POST['complaintsId'];

   // Fetch subject, message, and date based on complaintsId
   $sql = "SELECT subject, message, date FROM comments_complaints WHERE complaints_id = $complaintsId";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
      echo "<p><strong>Subject:</strong> " . $row['subject'] . "</p>";
      echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
   } else {
      echo "No details found for inquiry ID: " . $complaintsId;
   }

   $conn->close();
} else {
   echo "Error: Inquiry ID not provided.";
}
?>
