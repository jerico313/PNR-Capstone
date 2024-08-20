<?php require_once('header.php'); ?>
<?php require_once('employee_sidenav.php'); ?>
<br><br><br><br><br><br><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="style-css.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .edit-user {
        width: 100%;
        max-width: 800px; /* Adjusted max-width for responsiveness */
        margin: 20px auto;
        margin-left: 200px;
        padding: 15px;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        border-top: 40px solid #174793;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .logo {
        text-align: center; /* Center align the logo */
        margin-bottom: 20px;
    }

    .edit-profile-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .image-upload {
        width: 100%; /* Adjusted width for responsiveness */
        text-align: center;
    }

    .profile-buttons {
        text-align: center;
        width: 100%;
    }

    .profile-buttons button {
        margin-bottom: 10px;
        padding: 5px 10px;
    }

    .profile-info {
        width: 100%;
    }

    .form-control {
        resize: both;
    }

    .image-preview {
        max-width: 100px;
        max-height: 100px;
        margin-top: 10px;
    }

    .btn {
        margin: 5px;
    }

    .image-upload label {
        text-align: left;
    }

    @media (max-width: 768px) {
        .edit-user {
            margin: 10px auto;
        }
        .edit-user p {
            font-size: 12px;
        }
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-12">
            <div class="edit-user">
                <div class="logo">
                <p style="position: absolute; top: -30px; left: 50px; transform: translateX(-50%); color: white;  font-size: 15px; font-weight: 900;">My Profile</p>
                </div>
                <div class="edit-profile-section">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="image-upload">
                                <label for="photo"><strong>Profile Image</strong></label><br>
                                <input type="file" id="photo" name="photo" accept="../assets/uploads/" onchange="previewImage(this)" style="display: none;">
                                <img id="image-preview" class="image-preview" src="../assets/uploads/<?php echo $profile_picture; ?>" alt="Profile Image">
                                <br><br>
                                <label for="photo" class="btn btn-success btn-sm choose-file-button">Change Photo</label>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removePhoto()">Remove Photo</button>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="profile-info">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="emp_firstName" value="<?php echo $firstname; ?>" style= "width: 300px;">
                                </div><br>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="emp_lastName" value="<?php echo $lastname; ?>" style="width: 300px;"> <!-- Adjusted width -->
                                </div>
                            </div>
                            <div class="form-group" style="text-align: right; padding-top:10px; padding-left: 320px;"> 
                                <button class="btn btn-success" onclick="updateProfile()">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to preview the selected photo
    function previewImage(input) {
        var preview = document.getElementById("image-preview");
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Function to remove the selected photo
    function removePhoto() {
        var input = document.getElementById("photo");
        var preview = document.getElementById("image-preview");

        input.value = null;
        preview.src = '../assets/uploads/default.jpg';
    }

    function updateProfile() {
        var firstNameInput = document.getElementById("first-name");
        var lastNameInput = document.getElementById("last-name");
        var photoInput = document.getElementById("photo");

        var firstName = firstNameInput.value;
        var lastName = lastNameInput.value;
        var photoFile = photoInput.files[0];

        var data = new FormData();
        data.append('emp_firstName', firstName);
        data.append('emp_lastName', lastName);
        data.append('photo', photoFile);

        // Send the data to the server using AJAX
        $.ajax({
            url: 'employee_update.php',
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);

                if (response === "Profile updated successfully.") {
                    location.reload();
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>
</body>
</html>
