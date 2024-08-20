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
$stationQuery = "SELECT station_name, station_value FROM stations"; // Replace 'stations' with your actual table name
$stationResult = mysqli_query($conn, $stationQuery);

$stationOptions = array();
while ($row = mysqli_fetch_assoc($stationResult)) {
    $stationName = $row['station_name'];
    $stationValue = $row['station_value'];
    $stationOptions[$stationName] = $stationValue;
}

function getFare($origin, $destination, $conn) {
    $route = "$origin - $destination";
    return getFareByRoute($route, $conn);
}

if (isset($_SESSION['user_id'])) {
    // User is logged in, include the logged-in navigation
    include('header2.php');
} else {
    // User is not logged in, include the main navigation
    include('header.php');
}

mysqli_close($conn);
?>
<div>
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">HELP AND CONTACTS</h1>
    </div>
</div>
<br><br>

<style> 
.contacts{
            margin: 0px 50px 20px 50px;
            font-weight: 1000;
        }
</style>

<div class ="contacts" style="padding-top:15px;">
<p style= "font-size: 35px"> COMPANY ADDRESS </p>
<a> PNR Executive Bldg (Tutuban Station), Mayhaligue Street </a>
<br>
<a> Tondo, Manila 1000 </a><br>
<a> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg> 5319-0041 </a>
<br><a> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M38.3 241.3L15.1 200.6c-9.2-16.2-8.4-36.5 4.5-50C61.4 106.8 144.7 48 256 48s194.6 58.8 236.4 102.6c12.9 13.5 13.7 33.8 4.5 50l-23.1 40.7c-7.5 13.2-23.3 19.3-37.8 14.6l-81.1-26.6c-13.1-4.3-22-16.6-22-30.4V144c-49.6-18.1-104-18.1-153.6 0v54.8c0 13.8-8.9 26.1-22 30.4L76.1 255.8c-14.5 4.7-30.3-1.4-37.8-14.6zM32 336c0-8.8 7.2-16 16-16H80c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V336zm0 96c0-8.8 7.2-16 16-16H80c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V432zM144 320h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16V336c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H240c-8.8 0-16-7.2-16-16V336zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16V336c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V336zm16 80h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H432c-8.8 0-16-7.2-16-16V432c0-8.8 7.2-16 16-16zM128 432c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16V432z"/> </svg> 5319-0169</a>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Page</title>
  <style>
    /* Add some basic styling for the buttons */
    .button {
      display: inline-block;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      color: #fff;
    }

    /* Style the "Inquiry" button with a blue color */
    .inquiry-button {
      background-color: #3498db;
    }

    /* Style the "Comments and Complaints" button with a blue color */
    .comments-button {
      background-color: #3498db;
    }
  </style>
</head>
<body>

  <!-- Inquiry Button -->
  <a href="inquiry.php" class="button inquiry-button">Inquiry</a> &nbsp; 

  <!-- Comments and Complaints Button -->
  <a href="comments_complaints.php" class="button comments-button">Comments and Complaints</a>

</body>
</html>


<br><br><p style= "font-size: 35px">Other Contact Details</p>
<!-- social media -->
<a style= "font-size: 25px">Social Media<a>
<p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="https://www.facebook.com/officialpnrpage/" target="_blank" rel="noopener"><em class="fa fa-facebook-square fa-3x fb-color"></em></a> &nbsp; &nbsp;<a href="https://twitter.com/PNR_GovPH" target="_blank" rel="noopener"><em class="fa fa-twitter-square fa-3x twitter-color"></em></a> <!-- tickets/reservation --></p>
<center>
<a style= "font-size: 25px"><em class="fa fa-phone-square"></em> Station Directory</a>
</center>
</div>
<center>
<table border="1" style="margin-left: 45.9pt; border-collapse: collapse; border: none; width: 556px; height: 861px;">
<tbody>
<tr>
<td style="width: 161.35pt; border: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><b><span style="font-size: 14pt; font-family: Cambria, serif;">Office/Station</span></b></p>
</td>
<td style="width: 161.35pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><b><span style="font-size: 12pt; font-family: Cambria, serif;">Mobile No.</span></b></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Tutuban-Control</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175827192</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Blumentritt</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175826882</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Laon Laan</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175826910</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">España</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175827409</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Sta. Mesa</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">02-2165350</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Pandacan</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175827457</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Paco</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829472</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">San Andres</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829722</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Vito Cruz</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829511</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Dela Rosa</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829721</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Pasay Road</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830126</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">EDSA</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829803</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Nichols</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175829942</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">FTI</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830366</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Bicutan</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830259</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Sucat</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830403</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Alabang</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830257</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">San Pedro</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830587</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Sta. Rosa</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830582</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Mamatid</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830751</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Calamba</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175830882</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">SIpocot</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175832331</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Libmanan</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175832039</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Pamplona</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175831887</span></p>
</td>
</tr>
<tr>
<td style="width: 161.35pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-top: none; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12pt; font-family: Cambria, serif;">Naga</span></strong></p>
</td>
<td style="width: 78.05pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt;">
<p style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;"><span style="font-size: 12pt; font-family: Cambria, serif;">9175832225</span></p>
</td>
</tr>
</tbody>
</table>
<br><br>
</center>
<div class ="contacts">
<!-- mailing address -->
<p style= "font-size: 35px"><em class="fa fa-envelope-o"></em> Mailing Address</p>
<p><span>All letters such as school request, photo &amp; video shoot request should be sent through postal mail addressed to:</span></p>
<div class="address-box" style= "font-weight: 900"><strong>The General Manager</strong><br />Office Of The General Manager <br />4th Floor PNR Executive Bldg, Mayhaligue St. <br /> Tondo, Manila 1000</div>
<p><br /><br /><span>All letters such as application for employment should be sent through postal mail addressed to:</span></p>
<div class="address-box"><strong>The Manager</strong><br /> Administration and Finance Department <br /> 4th Floor PNR Executive Bldg, Mayhaligue St. <br /> Tondo, Manila 1000</div>
<p><span style="font-family: Helvetica, Arial; color: #800000;"></span></p>
<p><a href="/contact-us/6.html"></a><br /><br /></p>
</div>




<br><br>
<?php require_once('footer.php'); ?>
