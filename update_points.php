<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $pointsToDeduct = $_POST['pointsToDeduct']; // Points to deduct from the user's balance

    // Connect to your database (use your database connection logic)
    include("admin/inc/config.php");

    // Retrieve the user's current points
    $sql = "SELECT points FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $currentPoints = $user_data['points'];

        // Calculate the new points balance
        $newPointsBalance = max(0, $currentPoints - $pointsToDeduct);

        // Update the user's points in the database
        $updateSql = "UPDATE accounts SET points = $newPointsBalance WHERE id = $user_id";
        mysqli_query($conn, $updateSql);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
