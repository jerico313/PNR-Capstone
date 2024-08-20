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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into the "inquire" table
    $insertQuery = "INSERT INTO inquiry (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $insertQuery)) {
        echo "Inquiry submitted successfully!";
        // Add JavaScript alert after successful submission
        echo '<script>alert("Inquiry submitted successfully!"); window.location.href = "inquiry.php";</script>';
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>




<div class="top">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">ONLINE CONTACT FORM</h1>
    </div>
</div>
</div>

<style>
    .contact-form {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 3px solid black;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    textarea {
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .contactform{
            margin: 0px 50px 20px 50px;
            font-weight: 1000;
        }
</style>
<center>
<div class ="contactform" style="padding-top:20px;">
<p style= "font-size: 35px"> CONTACT FORM </p>
</center>
<div class="contact-form">
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

    <form action="inquiry.php" method="post">
        <input type="submit" value="Submit" onclick="reloadPage()">
    </form>
</div>

<script>
    function reloadPage() {
        location.reload();
    }
</script>



    </form>
</div>



<br><br>
<?php require_once('footer.php'); ?>
