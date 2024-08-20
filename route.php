<?php
// Start the session
session_start();

include("admin/inc/config.php"); // Replace 'db_connect.php' with your database connection file


// Check if the user is logged in and retrieve user data, including the profile picture
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        // Other user data retrieval
    } else {
        // Handle the case where user data is not found
        $profile_picture = 'default_profile.jpg'; // Set a default profile picture
    }
}

$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';
$stationQuery = "SELECT station_name, station_value FROM stations"; // Replace 'stations' with your actual table name
$stationResult = mysqli_query($conn, $stationQuery);

$stationOptions = array();
while ($row = mysqli_fetch_assoc($stationResult)) {
    $stationName = $row['station_name'];
    $stationValue = $row['station_value'];
    $stationOptions[$stationName] = $stationValue;
}

function getFare($origin, $destination, $conn) {
    $route = "$origin - $destination";
    return getFareByRoute($route, $conn);
}

if (isset($_SESSION['user_id'])) {
    // User is logged in, include the logged-in navigation
    include('header2.php');
} else {
    // User is not logged in, include the main navigation
    include('header.php');
}

mysqli_close($conn);
?>
<div class="top">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">ROUTE MAP</h1>
    </div>
</div>
</div>
<br><br>

<center>
    <img src="images/Route_Map.jpg" width="779" height="383" style="border: 2px solid #000; border-radius: 15px;">
</center>




<br><br>
<?php require_once('footer.php'); ?>
