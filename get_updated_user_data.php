<?php
session_start();

include("admin/inc/config.php");

if (!isset($_SESSION['user_id'])) {
    // Handle unauthorized access
    echo "Unauthorized access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_SESSION['user_id'];

    // Fetch the updated user data
    $sql = "SELECT firstname, lastname, email FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);

        // Ensure that keys are named correctly as 'firstName' and 'lastName'
        $updatedData = array(
            'firstName' => $user_data['firstname'],
            'lastName' => $user_data['lastname'],
            'email' => $user_data['email']
        );

        echo json_encode($updatedData);
    } else {
        echo json_encode(array());
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
