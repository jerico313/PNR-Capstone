<?php
session_start();

include("../admin/inc/config.php");

if (!isset($_SESSION['employee_id'])) {
    // Handle unauthorized access
    echo "Unauthorized access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_SESSION['employee_id'];
    $emp_firstname = $_POST['emp_firstName'];
    $emp_lastname = $_POST['emp_lastName'];

    // Check if the "Remove Photo" checkbox is checked
    $removePhoto = isset($_POST['removePhoto']) && $_POST['removePhoto'] === 'on';

    if ($removePhoto) {
        // Remove the profile picture from the database
        $updateQuery = "UPDATE employees SET emp_firstname = '$emp_firstname', emp_lastname = '$emp_lastname', profile_picture = NULL WHERE employee_id = $employee_id";
        
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
            $photoFileName = $employee_id . '_' . $photoFile['name'];

            if (move_uploaded_file($photoFile['tmp_name'], $uploadPath . $photoFileName)) {
                // Update the 'profile_picture' column in the database
                $updateQuery = "UPDATE employees SET emp_firstname = '$emp_firstname', emp_lastname = '$emp_lastname', profile_picture = '$photoFileName' WHERE employee_id = $employee_id";

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
            $updateQuery = "UPDATE employees SET emp_firstname = '$emp_firstname', emp_lastname = '$emp_lastname' WHERE employee_id = $employee_id";

            if (mysqli_query($conn, $updateQuery)) {

                $_SESSION['emp_firstname'] = $emp_firstname;
                $_SESSION['emp_lastname'] = $emp_lastname;
        
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
