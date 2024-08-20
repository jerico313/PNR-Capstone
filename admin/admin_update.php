<?php
session_start();

include("inc/config.php");

if (!isset($_SESSION['admin_id'])) {
    // Handle unauthorized access
    echo "Unauthorized access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_SESSION['admin_id'];
    $adm_firstname = $_POST['adm_firstName'];
    $adm_lastname = $_POST['adm_lastName'];

    // Check if the "Remove Photo" checkbox is checked
    $removePhoto = isset($_POST['removePhoto']) && $_POST['removePhoto'] === 'on';

    if ($removePhoto) {
        // Remove the profile picture from the database
        $updateQuery = "UPDATE admin SET adm_firstname = '$adm_firstname', adm_lastname = '$adm_lastname', profile_picture = NULL WHERE admin_id = $admin_id";
        
        if (mysqli_query($conn, $updateQuery)) {
            echo "Profile picture removed and profile updated successfully.";
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    } else {
        // Handle profile picture update if it's provided
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            $photoFile = $_FILES['photo'];
            $uploadPath = '../assets/uploads/'; // Specify the directory to upload the image
            $photoFileName = $admin_id . '_' . $photoFile['name'];

            if (move_uploaded_file($photoFile['tmp_name'], $uploadPath . $photoFileName)) {
                // Update the 'profile_picture' column in the database
                $updateQuery = "UPDATE admin SET adm_firstname = '$adm_firstname', adm_lastname = '$adm_lastname', profile_picture = '$photoFileName' WHERE admin_id = $admin_id";

                if (mysqli_query($conn, $updateQuery)) {
                    echo "Profile updated successfully.";
                } else {
                    echo "Error updating profile: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading the profile picture.";
            }
        } else {
            // Update user information without changing the profile picture
            $updateQuery = "UPDATE admin SET adm_firstname = '$adm_firstname', adm_lastname = '$adm_lastname' WHERE admin_id = $admin_id";

            if (mysqli_query($conn, $updateQuery)) {

                $_SESSION['adm_firstname'] = $adm_firstname;
                $_SESSION['adm_lastname'] = $adm_lastname;
        
                echo "Profile updated successfully.";
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        }
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
