<?php
// update_train.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['train']) && isset($_POST['selectedSchedules'])) {
    $selectedTrain = $_POST['train'];
    $selectedSchedules = $_POST['selectedSchedules'];

    // Update the train value in the database
    include("inc/config.php");

    $stmtSucat = $conn->prepare("UPDATE tutuban_sucat SET train = ? WHERE schedule_id = ?");
    $stmtSucat->bind_param("si", $selectedTrain, $scheduleId);

    $stmtBicutan = $conn->prepare("UPDATE tutuban_bicutan SET train = ? WHERE schedule_id = ?");
    $stmtBicutan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtFTI = $conn->prepare("UPDATE tutuban_fti SET train = ? WHERE schedule_id = ?");
    $stmtFTI->bind_param("si", $selectedTrain, $scheduleId);

    $stmtNichols = $conn->prepare("UPDATE tutuban_nichols SET train = ? WHERE schedule_id = ?");
    $stmtNichols->bind_param("si", $selectedTrain, $scheduleId);

    foreach ($selectedSchedules as $scheduleId) {
        
        $stmtSucat->execute();
        $stmtBicutan->execute();
        $stmtFTI->execute();
        $stmtNichols->execute();
    }

    $stmtSucat->close();
    $stmtBicutan->close();
    $stmtFTI->close();
    $stmtNichols->close();
    $conn->close();
}
?>
