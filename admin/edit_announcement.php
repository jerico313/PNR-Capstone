<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $editAnnouncementId = $_POST['editAnnouncementId'];
    $editAnnouncementContent = $_POST['announcement_content'];

    // Validate the data (you may want to add more validation)
    if (empty($editAnnouncementId) || empty($editAnnouncementContent)) {
        // Handle validation error
        echo "Error: All fields are required.";
    } else {
        // Update the announcement record in the database
        include("inc/config.php");

        $sql = "UPDATE announcements SET
                description = '$editAnnouncementContent'
                WHERE announcement_id = $editAnnouncementId";

        if ($conn->query($sql) === TRUE) {
            // Record updated successfully
            echo "<script>alert('Announcement updated successfully'); window.location = 'announcement.php';</script>";
        } else {
            // Error occurred
            echo "Error updating announcement: " . $conn->error;
        }

        $conn->close();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
