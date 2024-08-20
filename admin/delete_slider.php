<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sliderId'])) {
    // Get the slider ID from the AJAX request
    $sliderId = $_POST['sliderId'];

    // Perform the deletion operation in the database
    include("inc/config.php");

    $sql = "DELETE FROM sliders WHERE slider_id = $sliderId";

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Slider deleted successfully";
    } else {
        // Error occurred
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    // Invalid request
    echo "Invalid request";
}
?>
