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

if (isset($_SESSION['user_id'])) {
    // User is logged in, include the logged-in navigation
    include('header2.php');
} else {
    // User is not logged in, include the main navigation
    include('header.php');
}

mysqli_close($conn);
?>
    <div id="howtoride">
    <div class="text-center trans">
    <div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">HOW TO RIDE</h1>
    </div>
</div><br>
    </div>
    <div class="contain">
        <p><strong>FRONTLINE SERVICES</strong></p>
        <p><strong>1. METRO SOUTH COMMUTER TRAIN (Tutuban - Calamba)</strong></p>
        <p><i>Note: Only Tutuban - Calamba is operational (as of December 2, 2014)</i></p>
        <p><strong>2. BICOL COMMUTER TRAIN (Tagkawayan - Legazpi)</strong></p>
        <p><i>Note: Only Naga - Sipocot is operational (as of January 2014)</i></p>
        <p><strong>Procedure:</strong></p>
        <p><strong>Step 1:</strong> Buy Ticket from Ticket Booth (5 seconds)</p>
        <p><strong>Step 2:</strong> Show Ticket to gate inspector/conductor (5 seconds)</p>
        <p><strong>Step 3:</strong> Ride the Train (1 minute) Estimated Travel Time</p>
        <ol style="list-style-type: upper-roman;">
            <li>Tutuban to Calamba: 2 hours</li>
            <li>Naga to Sipocot: 45 minutes</li>
        </ol>
        <p><strong>Step 4:</strong> Exit Train (1 minute)</p>
        <p><strong>Step 5:</strong> Show Ticket to Inspector at station or destination (5 seconds)</p>
        <p><i>Note: Always keep ticket while inside the train before leaving the station of destination for inspection. Passenger found without ticket or short ticketed will be charge with the full amount of fare for the route.</i></p>
    </div>
    </div>
<?php require_once('footer.php'); ?>   