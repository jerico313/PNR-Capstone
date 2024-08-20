<?php
session_start();

include("admin/inc/config.php");

if (!isset($_SESSION['user_id'])) {
    // Handle unauthorized access
    echo "Unauthorized access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // Check if the "Remove Photo" checkbox is checked
    $removePhoto = isset($_POST['removePhoto']) && $_POST['removePhoto'] === 'on';

    if ($removePhoto) {
        // Remove the profile picture from the database
        $updateQuery = "UPDATE accounts SET firstname = '$firstName', lastname = '$lastName', email = '$email', profile_picture = NULL WHERE id = $user_id";
        
        if (mysqli_query($conn, $updateQuery)) {
            echo "Profile picture removed and profile updated successfully.";
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    } else {
        // Handle profile picture update if it's provided
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            $photoFile = $_FILES['photo'];
            $uploadPath = 'assets/uploads/'; // Specify the directory to upload the image
            $photoFileName = $user_id . '_' . $photoFile['name'];

            if (move_uploaded_file($photoFile['tmp_name'], $uploadPath . $photoFileName)) {
                // Update the 'profile_picture' column in the database
                $updateQuery = "UPDATE accounts SET firstname = '$firstName', lastname = '$lastName', email = '$email', profile_picture = '$photoFileName' WHERE id = $user_id";

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
            $updateQuery = "UPDATE accounts SET firstname = '$firstName', lastname = '$lastName', email = '$email' WHERE id = $user_id";

            if (mysqli_query($conn, $updateQuery)) {

                $_SESSION['firstname'] = $firstName;
                $_SESSION['lastname'] = $lastName;
        
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
