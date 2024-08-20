<?php
// update_train.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['train']) && isset($_POST['selectedSchedules'])) {
    $selectedTrain = $_POST['train'];
    $selectedSchedules = $_POST['selectedSchedules'];

    // Update the train value in the database
    include("inc/config.php");

    $stmtSucat = $conn->prepare("UPDATE tutuban_sucat SET train = ? WHERE schedule_id = ?");
    $stmtSucat->bind_param("si", $selectedTrain, $scheduleId);
    foreach ($selectedSchedules as $scheduleId) {
        
        $stmtSucat->execute();
    }

    $stmtSucat->close();
    $conn->close();
}
?>
