<?php
// Include your database connection file
include 'inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the request
    $scheduleId = $_POST['editScheduleId'];
    $hour = $_POST['edithour'];
    $minute = $_POST['editminute'];
    $period = $_POST['editperiod'];
    $status = $_POST['editstatus'];
    $direction = $_POST['editdirection'];

    // Format time as needed (e.g., convert to 24-hour format)
    $time = sprintf("%02d:%02d %s", $hour, $minute, $period);

    // Update the schedule in the database
    $query = "UPDATE bluementritt SET time = '$time', status = '$status', direction = '$direction' WHERE schedule_id = $scheduleId";

    if (mysqli_query($conn, $query)) {
        // Show a success message using JavaScript alert
        echo "<script>alert('Schedule updated successfully');window.location = 'schedule_bluementritt.php';</script>";
    } else {
        // Show an error message using JavaScript alert
        echo "<script>alert('Error updating schedule');window.location = 'schedule_bluementritt.php';</script>";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle the case where the request method is not POST
    // Show an error message using JavaScript alert
    echo "<script>alert('Invalid request method');</script>";
}
?>

