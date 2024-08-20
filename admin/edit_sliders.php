<?php
require_once('inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editSliderId = $_POST['editSliderId'];

    // Retrieve file details
    $editSliderImageTmpPath = $_FILES['editSliderImage']['tmp_name'];
    $editSliderImageName = $_FILES['editSliderImage']['name'];
    $editSliderImageSize = $_FILES['editSliderImage']['size'];
    $editSliderImageType = $_FILES['editSliderImage']['type'];
    $editSliderImageNameCmps = explode(".", $editSliderImageName);
    $editSliderImageExtension = strtolower(end($editSliderImageNameCmps));

    // Generate a unique name for the uploaded file
    $newEditSliderImageName = md5(time() . $editSliderImageName) . '.' . $editSliderImageExtension;

    // Set the upload directory
    $uploadDirectory = "../assets/uploads/";

    // Move the uploaded file to the destination folder
    $editSliderImageDestPath = $uploadDirectory . $newEditSliderImageName;
    move_uploaded_file($editSliderImageTmpPath, $editSliderImageDestPath);

    // Update the slider record in the database with the new image
    include("inc/config.php");

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE sliders SET slider_image = ? WHERE slider_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newEditSliderImageName, $editSliderId);

    if ($stmt->execute()) {
        // Record updated successfully
        echo "<script>alert('Record updated successfully'); window.location = 'sliders.php';</script>";
    } else {
        // Error occurred, show JavaScript alert with the error message
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
    $conn->close();
}
?>
