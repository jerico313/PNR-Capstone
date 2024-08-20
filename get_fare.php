<?php
// Include your database connection code
include("admin/inc/config.php");

if (isset($_POST['origin']) && isset($_POST['destination'])) {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    // Function to get fare and direction by route
    function getFareAndDirectionByRoute($route, $conn) {
        $sql = "SELECT fare, Direction FROM faretable WHERE Route = '$route'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $fareData = mysqli_fetch_assoc($result);
            return $fareData;
        } else {
            return array('fare' => 0.00, 'Direction' => ''); // Return default values if not found
        }
    }

    // Create the route based on the selected origin and destination stations
    $route = "$origin - $destination";

    // Get the fare and direction for the given route
    $fareAndDirection = getFareAndDirectionByRoute($route, $conn);

    // Close the database connection
    mysqli_close($conn);

    echo json_encode($fareAndDirection); // Return the fare and direction as JSON
} else {
    echo json_encode(array('fare' => 0.00, 'Direction' => '')); // Default values if origin and destination are not set
}
?>
