<?php
// Include your database connection file if not included already
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $editTrainId = $_POST['editTrainId'];
    $editTrainName = $_POST['editTrainName'];
    $editEmployeeId = $_POST['employeename']; // Updated variable name

    // Validate the data (you may want to add more validation)
    if (empty($editTrainId) || empty($editTrainName) || empty($editEmployeeId)) {
        // Handle validation error
        echo "Error: All fields are required.";
    } else {
        // Update the train record in the database using prepared statement
        include("inc/config.php");

        $sql = "UPDATE trains SET
                train_no = ?,
                train_value = ?,
                current_employee_id = ?
                WHERE train_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $editTrainName, $editTrainName, $editEmployeeId, $editTrainId);

        if ($stmt->execute()) {
            // Record updated successfully
            echo "<script>alert('Train updated successfully'); window.location = 'trains.php';</script>";
        } else {
            // Error occurred
            echo "Error updating train: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
