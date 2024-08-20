<?php
// update_train.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['train']) && isset($_POST['selectedSchedules'])) {
    $selectedTrain = $_POST['train'];
    $selectedSchedules = $_POST['selectedSchedules'];

    // Update the train value in the database
    include("inc/config.php");

    $stmtSantaMesa = $conn->prepare("UPDATE santamesa SET train = ? WHERE schedule_id = ?");
    $stmtSantaMesa->bind_param("si", $selectedTrain, $scheduleId);

    $stmtEspaña = $conn->prepare("UPDATE españa SET train = ? WHERE schedule_id = ?");
    $stmtEspaña->bind_param("si", $selectedTrain, $scheduleId);

    $stmtLaonLaan = $conn->prepare("UPDATE laonlaan SET train = ? WHERE schedule_id = ?");
    $stmtLaonLaan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtBluementritt = $conn->prepare("UPDATE bluementritt SET train = ? WHERE schedule_id = ?");
    $stmtBluementritt->bind_param("si", $selectedTrain, $scheduleId);
    foreach ($selectedSchedules as $scheduleId) {
        // Execute the update for "alabang" table
    
        $stmtSantaMesa->execute();
        $stmtEspaña->execute();
        $stmtLaonLaan->execute();
        $stmtBluementritt->execute();
    }

    
    $stmtSantaMesa->close();
    $stmtEspaña->close();
    $stmtLaonLaan->close();
    $stmtBluementritt->close();
    $conn->close();
}
?>
