<?php
// get_inquiry_email.php

require_once('inc/config.php');

if (isset($_POST['inquiryId'])) {
    $inquiryId = $_POST['inquiryId'];

    // Fetch the email from the database based on the inquiryId
    $sql = "SELECT email FROM inquiry WHERE inquiry_id = $inquiryId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['email'];
    } else {
        echo 'Email not found';
    }

    $conn->close();
} else {
    echo 'Invalid request';
}
?>
