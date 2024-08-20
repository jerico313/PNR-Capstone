<?php
require_once('inc/db.php');

header("Content-Type: application/json");
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data["latitude"]) && isset($data["longitude"]) && isset($data["employee_id"])) {
    $latitude = mysqli_real_escape_string($conn, $data["latitude"]);
    $longitude = mysqli_real_escape_string($conn, $data["longitude"]);
    $employee_id = mysqli_real_escape_string($conn, $data["employee_id"]);

    $sql = "INSERT INTO locations (employee_id, latitude, longitude, timestamp) VALUES ('$employee_id', '$latitude', '$longitude', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Location data saved"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid data"]);
}


?>
