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

<!DOCTYPE html>
<html>
<head>


<style> 
.careers{
            margin: 0px 50px 20px 30px;
            font-weight: 1000;
        }
        
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #174793;
   color: white;
}
</style>
</head>
<body>
<div style="padding-top:180px;">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">PERMANENT VACANCY</h1>
    </div>
</div>
<br><br>
<div class ="careers">
<p style= "font-size: 40px"> NOTICE OF VACANCY </p>
</div>
<div style="padding:10px 30px 10px 30px;">
<table class="table table-striped">
  <center>
  <tr>
    <th>No. of Vacant Position</th>
    <th>Position Title</th>
    <th>Place of Assignment</th>
    <th>Deadline of Submission</th>
  </tr>
<div class=" td, th">
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Division Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 17, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Engineering Assistant A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 5, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Contruction Foreman A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 5, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">2</td>
<td>Heavy Equipment Operator</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 5, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Division Manager B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">July 3, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td><b>Principal Engineer A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 26, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Mechanic B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 23, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Supervising Engineer A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 23, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">2</td>
<td>Principal Engineer A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 23, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Division Manager B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 2, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Engineering Assistant A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">March 16, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Corporate Accounts Analyst</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">March 16, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">3</td>
<td> Railway Operations Officer C</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 9, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Senior Computer Operator</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 22, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Cash Clerk III</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 22, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Finance Analyst III</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 22, 2023</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">December 1, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Division Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">December 1, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Shipping Assistant</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">November 13, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Corporate Accountant</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">November 13, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Division Manager B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 09, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Department Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 12, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 12, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Corporate Attorney A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 12, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Chief Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 05, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Department Manager A</b></a></td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">August 28, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Chief Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 28, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Chief Corporate Attorney </td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 17, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 17, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Corporate Accountant</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 17, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td> Senior Computer Operator</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">March 16, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Draftsman</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 25, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Chief Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 25, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 9, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Maintenance Foreman B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">February 9, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Engineering Assistant A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">February 9, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Supervising Electronics Communication System Operator</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 9, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Division Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">February 9, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td >Railways Maintenance Foreman B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">January 22, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Engineering Assistant A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">January 22, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Supervising Electronics Communication System Operator</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 22, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Division Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 22, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Attorney II</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 14, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Legal Officer II</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 14, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Engineer I</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 14, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Train Foreman</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">January 11, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Quality Control Inspector</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">January 11, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Train Mechanic A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">January 11, 2022</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Corporate Accountant</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">December 02, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">December 02, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Assistant General Manager</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 15, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 15, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Attorney V</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Corporate Budget Officer B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Cashier C</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td >Corporate Budget Officer B</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Corporate Accountant</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Corporate Accountant A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 14, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Inspector</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">August 1, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Officer C</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">June 17, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Draftsman</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">May 24, 2021</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td >Internal Auditor V</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">November 14, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Inspector</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 17, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Principal Engineer A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">September 25, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Property Officer</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 25, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Electronics Communication Planning Specialist</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">September 25, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td >Finance Analyst III</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">August 27, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Chief Corporate Attorney</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">August 20, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Human Resource Management Office II</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">July 31, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Inspector</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">June 21, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Transport Operations Supervisor B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">June 21, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Officer C</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">June 21, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Maintenance Foreman B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">March 13, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Division Manager A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">February 20, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Department Manager A</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">January 18, 2020</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railway Operations Officer B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Maintenance Worker</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Maintenance Foreman</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Draftsman</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Heavy Equipment Operator</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Senior Mechanic B</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Train Foreman</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Principal Engineer A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 20, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Internal Auditor III</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">November 1, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Railways Operations Inspector</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 26, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Department Manager A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 28, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Attorney V</td>
<td style="width: 200px; text-align: center;">Manila</td>
<td style="width: 200px; text-align: center;">October 4, 2019</td>
</tr>
<tr>
<td style="width: 200px; text-align: center;">1</td>
<td>Principal Engineer A</td>
<td style="width: 200px; text-align: center;">Manila to Naga</td>
<td style="width: 200px; text-align: center;">October 26, 2019</td>
</tr>
</center>
</table>
</div>
</div>
</body>
</html>




<br><br>
<?php require_once('footer.php'); ?>
