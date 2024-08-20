<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: header.php");
    exit();
}

include("inc/config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admin_id = $_SESSION['admin_id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $retypeNewPassword = $_POST['retypeNewPassword'];

    // Check if the current password matches the one in the database
    $sql = "SELECT password FROM admin WHERE admin_id = ?";
    
    // Use a prepared statement to protect against SQL injection
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $admin_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['password'];

        if (password_verify($currentPassword, $dbPassword)) {
            if ($newPassword === $retypeNewPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateSql = "UPDATE admin SET password = ? WHERE admin_id = ?";
                
                // Use a prepared statement for the update as well
                $updateStmt = mysqli_prepare($conn, $updateSql);
                mysqli_stmt_bind_param($updateStmt, "si", $hashedPassword, $admin_id);
                
                if (mysqli_stmt_execute($updateStmt)) {
                    echo '<script>alert("Password updated successfully."); window.location.href = "admin_change_password.php";</script>';
                } else {
                    echo '<script>alert("Error updating password: ' . mysqli_error($conn) . '");</script>';
                }
            } else {
                echo '<script>alert("New passwords do not match.");</script>';
            }
        } else {
            echo '<script>alert("Current password is incorrect.");</script>';
        }
    } else {
        echo '<script>alert("User not found.");</script>';
    }

    mysqli_close($conn);
}
?>
