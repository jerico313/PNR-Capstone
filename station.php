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

mysqli_close($conn);
?>


<header>
<style>
    .table-container {
        margin: 0 auto; 
        width: 50%; 
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: none; 
    }

    th {
        background-color: #f2f2f2;
        border-bottom: none; 
    }

    .table-container td { 
        padding: 8px;
        text-align: center; 
        border: 1px solid #000; 
    }

    .table-container table tr:nth-child(odd) {
        background-color: #FFC30B; 
    }

    .table-container td {
        font-weight: bold;
    }

    /* Set the color of the text inside <a> tags to black */
    .table-container a {
        text-decoration: none;
        color: black; /* Set the text color to black */
    }
</style>
</header>
<body>
<div class="box">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">SCHEDULE</h1>
    </div>
</div>
<br>
<br>
<div class="table-container">
    <table>
        <tr>
        <td><a href="alabang.php">Alabang</a></td>
            <td><a href="sanandres.php">San Andres</a></td>
        </tr>
        <tr>
        <td><a href="sucat.php">Sucat</a></td>
            <td><a href="paco.php">Paco</a></td>
        </tr>
        <tr>
        <td><a href="bicutan.php">Bicutan</a></td>
            <td><a href="pandacan.php">Pandacan</a></td>
        </tr>
        <tr>
        <td><a href="fti.php">FTI</a></td>
            <td><a href="santamesa.php">Santa Mesa</a></td>
        </tr>
        <tr>
        <td><a href="nichols.php">Nichols</a></td>
            <td><a href="espana.php">España</a></td>
        </tr>
        <tr>
        <td><a href="edsa.php">EDSA</a></td>
            <td><a href="laonlaan.php">Laon-Laan</a></td>
        </tr>
        <tr>
        <td><a href="pasayroad.php">Pasay Road</a></td>
            <td><a href="bluementritt.php">Bluementritt</a></td>
        </tr>
        <tr>
        <td><a href="buendia.php">Buendia</a></td>
            <td><a href="tutuban.php">Tutuban</a></td>
        </tr>
        <tr>
        <td><a href="vitocruz.php">Vito Cruz</a></td>
            <td></td>
        </tr>
    </table>
</div>
</div>
<br><br>
</body>
<?php require_once('footer.php'); ?>
