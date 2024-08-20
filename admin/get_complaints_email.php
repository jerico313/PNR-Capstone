<?php
// get_inquiry_email.php

require_once('inc/config.php');

if (isset($_POST['complaintsId'])) {
    $complaintsId = $_POST['complaintsId'];

    // Fetch the email from the database based on the inquiryId
    $sql = "SELECT email FROM comments_complaints WHERE complaints_id = $complaintsId";
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
