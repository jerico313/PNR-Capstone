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

    $stmtEDSA = $conn->prepare("UPDATE tutuban_edsa SET train = ? WHERE schedule_id = ?");
    $stmtEDSA->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPasayRoad = $conn->prepare("UPDATE tutuban_pasayroad SET train = ? WHERE schedule_id = ?");
    $stmtPasayRoad->bind_param("si", $selectedTrain, $scheduleId);

    $stmtBuendia = $conn->prepare("UPDATE tutuban_buendia SET train = ? WHERE schedule_id = ?");
    $stmtBuendia->bind_param("si", $selectedTrain, $scheduleId);

    $stmtVitoCruz = $conn->prepare("UPDATE tutuban_vitocruz SET train = ? WHERE schedule_id = ?");
    $stmtVitoCruz->bind_param("si", $selectedTrain, $scheduleId);

    $stmtSanAndres = $conn->prepare("UPDATE tutuban_sanandres SET train = ? WHERE schedule_id = ?");
    $stmtSanAndres->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPaco = $conn->prepare("UPDATE tutuban_paco SET train = ? WHERE schedule_id = ?");
    $stmtPaco->bind_param("si", $selectedTrain, $scheduleId);

    $stmtPandacan = $conn->prepare("UPDATE tutuban_pandacan SET train = ? WHERE schedule_id = ?");
    $stmtPandacan->bind_param("si", $selectedTrain, $scheduleId);

    $stmtSantaMesa = $conn->prepare("UPDATE tutuban_santamesa SET train = ? WHERE schedule_id = ?");
    $stmtSantaMesa->bind_param("si", $selectedTrain, $scheduleId);

    $stmtEspaña = $conn->prepare("UPDATE tutuban_españa SET train = ? WHERE schedule_id = ?");
    $stmtEspaña->bind_param("si", $selectedTrain, $scheduleId);

    $stmtLaonLaan = $conn->prepare("UPDATE tutuban_laonlaan SET train = ? WHERE schedule_id = ?");
    $stmtLaonLaan->bind_param("si", $selectedTrain, $scheduleId);

    foreach ($selectedSchedules as $scheduleId) {
        
        $stmtSucat->execute();
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
    }

    $stmtSucat->close();
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
    $conn->close();
}
?>
