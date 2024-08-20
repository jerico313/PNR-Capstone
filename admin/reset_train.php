<?php
// Include your database connection code here if not already included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add logic to reset the train column in your database
    include("inc/config.php");

    $sql = "UPDATE alabang SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE sucat SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE bicutan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE fti SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE nichols SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE edsa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE pasayroad SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE buendia SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE vitocruz SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE sanandres SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE paco SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE pandacan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE santamesa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE españa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE laonlaan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE bluementritt SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE santamesa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_sucat SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_bicutan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_edsa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_pasayroad SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_buendia SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_vitocruz SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_sanandres SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_paco SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_pandacan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_santamesa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_españa SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_laonlaan SET train = ' '";
    $result = $conn->query($sql);

    $sql = "UPDATE tutuban_bluementritt SET train = ' '";
    $result = $conn->query($sql);
    $conn->close();

    // Send a JSON response indicating success
    echo json_encode(['success' => true]);
} else {
    // Send a JSON response indicating failure
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
