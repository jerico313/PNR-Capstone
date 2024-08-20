<?php
session_start();

// Check if the user is logged in (check for user_id in the session)
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

// Include the database connection code
include("admin/inc/config.php");

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

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

if (isset($_SESSION['user_id'])) {
    include('header2.php');
    include('user_sidenav.php');
} else {
    include('header.php');
}

mysqli_close($conn);
?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="style-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .edit-user {
            width: 800px;
            height: auto;
            margin: 20px auto;
            margin-left: 200px;
            padding: 15px;
            background-color: #FFF;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Media query for small screens (e.g., mobile devices) */
        @media (max-width: 768px) {
            .edit-user {
                width: 100%;
                margin: 20px 0;
                margin-left: 0;
            }
        }

        /* Fixed border-top size for all screen sizes */
        .edit-user::before {
            content: '';
            height: 40px; /* Set your desired border-top height here */
            background: #FFC30B;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="edit-user">
                <div class="logo">
                <p style="position: absolute; top: 10px; left: 78px; transform: translateX(-50%); font-size: 15px; font-weight: 900;">Change Password</p>
                </div>
<br><br>
                <form action="user_password.php" method="post">
                <div class="form-group">
        <label for="currentPassword">Current Password</label>
        <div class="input-group" style="width: 400px; ">
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-eye" style="height: 20px; " id="toggleCurrentPassword"></i>
                </span>
            </div>
        </div>
    </div><br>
    <div class="form-group">
        <label for="newPassword">New Password</label>
        <div class="input-group" style="width: 400px;">
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-eye" id="toggleNewPassword"></i>
                </span>
            </div>
        </div>
    </div><br>
    <div class="form-group">
        <label for="retypeNewPassword">Re-Type New Password</label>
        <div class="input-group" style="width: 400px;">
            <input type="password" class="form-control" id="retypeNewPassword" name="retypeNewPassword" required>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fas fa-eye" id="toggleRetypeNewPassword"></i>
                </span>
            </div>
        </div>
    </div><br>
    <form action="user_password.php" method="post">
    <div class="form-group" style="text-align: right; padding-top:15px; padding-left: 320px;"> 
                                <button class="btn btn-success" onclick="updateProfile()">Update</button>
                            </div>
    </form>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility(inputField, eyeIcon) {
        const passwordInput = document.getElementById(inputField);
        const eye = document.getElementById(eyeIcon);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eye.classList.remove("fa-eye");
            eye.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eye.classList.remove("fa-eye-slash");
            eye.classList.add("fa-eye");
        }
    }

    // Attach click event handlers to the eye icons
    document.getElementById("toggleCurrentPassword").addEventListener("click", function () {
        togglePasswordVisibility("currentPassword", "toggleCurrentPassword");
    });
    document.getElementById("toggleNewPassword").addEventListener("click", function () {
        togglePasswordVisibility("newPassword", "toggleNewPassword");
    });
    document.getElementById("toggleRetypeNewPassword").addEventListener("click", function () {
        togglePasswordVisibility("retypeNewPassword", "toggleRetypeNewPassword");
    });
</script>

</body>
</html>
