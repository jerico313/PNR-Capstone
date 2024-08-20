<?php
// update_train.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['train']) && isset($_POST['selectedSchedules'])) {
    $selectedTrain = $_POST['train'];
    $selectedSchedules = $_POST['selectedSchedules'];

    // Update the train value in the database
    include("inc/config.php");


    $stmtBicutan = $conn->prepare("UPDATE bicutan SET train = ? WHERE schedule_id = ?");
    $stmtBicutan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtFTI = $conn->prepare("UPDATE fti SET train = ? WHERE schedule_id = ?");
    $stmtFTI->bind_param("si", $selectedTrain, $scheduleId);

    $stmtNichols = $conn->prepare("UPDATE nichols SET train = ? WHERE schedule_id = ?");
    $stmtNichols->bind_param("si", $selectedTrain, $scheduleId);

    $stmtEDSA = $conn->prepare("UPDATE edsa SET train = ? WHERE schedule_id = ?");
    $stmtEDSA->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPasayRoad = $conn->prepare("UPDATE pasayroad SET train = ? WHERE schedule_id = ?");
    $stmtPasayRoad->bind_param("si", $selectedTrain, $scheduleId);

    $stmtBuendia = $conn->prepare("UPDATE buendia SET train = ? WHERE schedule_id = ?");
    $stmtBuendia->bind_param("si", $selectedTrain, $scheduleId);

    $stmtVitoCruz = $conn->prepare("UPDATE vitocruz SET train = ? WHERE schedule_id = ?");
    $stmtVitoCruz->bind_param("si", $selectedTrain, $scheduleId);

    $stmtSanAndres = $conn->prepare("UPDATE sanandres SET train = ? WHERE schedule_id = ?");
    $stmtSanAndres->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPaco = $conn->prepare("UPDATE paco SET train = ? WHERE schedule_id = ?");
    $stmtPaco->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPandacan = $conn->prepare("UPDATE pandacan SET train = ? WHERE schedule_id = ?");
    $stmtPandacan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtSantaMesa = $conn->prepare("UPDATE santamesa SET train = ? WHERE schedule_id = ?");
    $stmtSantaMesa->bind_param("si", $selectedTrain, $scheduleId);

    $stmtEspaña = $conn->prepare("UPDATE españa SET train = ? WHERE schedule_id = ?");
    $stmtEspaña->bind_param("si", $selectedTrain, $scheduleId);

    $stmtLaonLaan = $conn->prepare("UPDATE laonlaan SET train = ? WHERE schedule_id = ?");
    $stmtLaonLaan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtBluementritt = $conn->prepare("UPDATE bluementritt SET train = ? WHERE schedule_id = ?");
    $stmtBluementritt->bind_param("si", $selectedTrain, $scheduleId);
    foreach ($selectedSchedules as $scheduleId) {

        $stmtBicutan->execute();
        $stmtFTI->execute();
        $stmtNichols->execute();
        $stmtEDSA->execute();
        $stmtPasayRoad->execute();
        $stmtBuendia->execute();
        $stmtVitoCruz->execute();
        $stmtSanAndres->execute();
        $stmtPaco->execute();
        $stmtPandacan->execute();
        $stmtSantaMesa->execute();
        $stmtEspaña->execute();
        $stmtLaonLaan->execute();
        $stmtBluementritt->execute();
    }

    $stmtBicutan->close();
    $stmtFTI->close();
    $stmtNichols->close();
    $stmtEDSA->close();
    $stmtPasayRoad->close();
    $stmtBuendia->close();
    $stmtVitoCruz->close();
    $stmtSanAndres->close();
    $stmtPaco->close();
    $stmtPandacan->close();
    $stmtSantaMesa->close();
    $stmtEspaña->close();
    $stmtLaonLaan->close();
    $stmtBluementritt->close();
    $conn->close();
}
?>
