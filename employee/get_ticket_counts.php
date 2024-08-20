<?php
require_once('../admin/inc/config.php');

// Establish a database conn
include("../admin/inc/config.php");

// Get the selected date from the GET parameters
$selectedDate = $_GET['date'];

// Fetch ticket counts for each station on the selected date
$queryTickets = "SELECT route, COUNT(*) as ticketCount FROM tickets WHERE DATE(date) = '$selectedDate' GROUP BY route";
$resultTickets = mysqli_query($conn, $queryTickets);

// Initialize an array to store the station counts
$stationCounts = array(
    'alabang' => 0,
    'sucat' => 0,
    'bicutan' => 0,
    'fti' => 0,
    'nichols' => 0,
    'edsa' => 0,
    'pasayroad' => 0,
    'buendia' => 0,
    'vitocruz' => 0,
    'sanandres' => 0,
    'paco' => 0,
    'pandacan' => 0,
    'santamesa' => 0,
    'españa' => 0,
    'laonlaan' => 0,
    'bluementritt' => 0,
    'tutuban' => 0
);

// Loop through the result and update the station counts
while ($rowTickets = mysqli_fetch_assoc($resultTickets)) {
    $stations = explode(" - ", $rowTickets['route']);
    $station = strtolower(trim($stations[0]));
    $stationKey = str_replace(' ', '', $station); // Remove spaces for key matching

    if (isset($stationCounts[$stationKey])) {
        $stationCounts[$stationKey] += $rowTickets['ticketCount'];
    }
}

// Close the database conn
mysqli_close($conn);

// Return the station counts as JSON
echo json_encode($stationCounts);
?>
