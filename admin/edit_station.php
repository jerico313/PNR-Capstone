<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $editStationId = $_POST['editStationId'];
    $editStationName = $_POST['editStationName'];

    // Validate the data (you may want to add more validation)
    if (empty($editStationId) || empty($editStationName)) {
        // Handle validation error
        echo "Error: All fields are required.";
    } else {
        // Update the station record in the database
        include("inc/config.php");

        // Set station_name and station_value to the same value
        $sql = "UPDATE stations SET
                station_name = '$editStationName',
                station_value = '$editStationName'
                WHERE station_id = $editStationId";

        if ($conn->query($sql) === TRUE) {
            // Record updated successfully
            echo "<script>alert('Station updated successfully'); window.location = 'stations.php';</script>";
        } else {
            // Error occurred
            echo "Error updating station: " . $conn->error;
        }

        $conn->close();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
