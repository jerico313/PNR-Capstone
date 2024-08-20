<?php 
// Start the session
session_start();

include("admin/inc/config.php"); // Replace 'db_connect.php' with your database connection file

function displaySchedule($station) {
    include("admin/inc/config.php");

    // Set the timezone to Asia/Manila
    date_default_timezone_set('Asia/Manila');

    $sql = "SELECT * FROM $station";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['schedule_id'] . "'>";
            echo "<td>" . $row['time'] . "</td>";

            // Check if it's time to show the status
            $currentTime = strtotime(date('H:i'));
            $scheduleTime = strtotime($row['time']);
            
            if ($currentTime >= $scheduleTime) {
                echo "<td style='background-color: " . ($row['status'] == 'On Time' ? '#189900' : '#df2c14') . "; color: white;'>" . $row['status'] . "</td>";
            } else {
                // Show a placeholder or empty status until it's time
                echo "<td> </td>";
            }
            echo "<td>" . $row['train'] . "</td>";
            echo "<td>" . $row['direction'] . "</td>";
            echo "</tr>";
        }
    }

    $conn->close();
}



function displayScheduleTutuban($station) {
    include("admin/inc/config.php");

    // Set the timezone to Asia/Manila
    date_default_timezone_set('Asia/Manila');

    $sql = "SELECT * FROM $station";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['schedule_id'] . "'>";
            echo "<td>" . $row['time'] . "</td>";

            // Check if it's time to show the status
            $currentTime = strtotime(date('H:i'));
            $scheduleTime = strtotime($row['time']);
            
            if ($currentTime >= $scheduleTime) {
                echo "<td style='background-color: " . ($row['status'] == 'On Time' ? '#189900' : '#df2c14') . "; color: white;'>" . $row['status'] . "</td>";
            } else {
                // Show a placeholder or empty status until it's time
                echo "<td> </td>";
            }
            echo "<td>" . $row['train'] . "</td>";
            echo "<td>" . $row['direction'] . "</td>";
            echo "</tr>";
        }
    }

    $conn->close();
}


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
    }

    th {
        background-color: #FFC30B;
        border-bottom: none; 
    }

    .table-container td { 
        padding: 8px;
        text-align: center; 
        border: 1px solid #000;
        width: 25%;
    }

    .table-container td {
        font-weight: bold;
    }
    .time-list {
        list-style: none;
        padding: 0;
    }

    .time-list li {
        margin: 4px 0;
    }

    @media (max-width: 768px) {
        .time-list li {
            font-size: 14px; 
        }
    }
</style>
</header>
<body>
<div class="box">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">PACO STATION</h1>
    </div>
</div>
<br>
<a class="nav-link active" style="color: black; padding: 10px;" aria-current="page" href="station.php">
    &nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-arrow-left-circle" viewBox="0 0 16 16" style="fill: black;">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>&nbsp;&nbsp;BACK
</a>
<br>
<center>
<div class="title" style="border:1px solid black;background-color:#FFC30B;;width:635px;height:50px;border-radius:10px;padding:5px;display:inline-block">
    <tr>
        <td><b style="font-size: 25px;"><i class="fa-solid fa-circle fa-lg" style="color:red;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:yellow;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:green;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; PACO - TUTUBAN &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:green;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:yellow;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:red;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i></b></td>
    </tr>
</div>
</center>
<br>

<div class="table-container">
<table id="example" class="table">
        <thead>
            <tr>
            <td style=" background-color: #FFC30B;">Time</td>
            <td style=" background-color: #FFC30B;">Status</td>
            <td style=" background-color: #FFC30B;">Train No.</td>
            <td style=" background-color: #FFC30B;">Direction</td>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displaySchedule("paco"); ?>
</tbody>
    </table>
</div>
<br>
<center>
<div class="title" style="border:1px solid black;background-color:#FFC30B;;width:635px;height:50px;border-radius:10px;padding:5px;display:inline-block">
    <tr>
        <td><b style="font-size: 25px;"><i class="fa-solid fa-circle fa-lg" style="color:red;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:yellow;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:green;text-shadow: 4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; TUTUBAN - PACO &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:green;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:yellow;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i> &nbsp; <i class="fa-solid fa-circle fa-lg" style="color:red;text-shadow: -4px 2px 2px rgba(0,0,0,0.6);"></i></b></td>
    </tr>
</div>
</center>
<br>

<div class="table-container">
<table id="example" class="table">
        <thead>
            <tr>
            <td style=" background-color: #FFC30B;">Time</td>
            <td style=" background-color: #FFC30B;">Status</td>
            <td style=" background-color: #FFC30B;">Train No.</td>
            <td style=" background-color: #FFC30B;">Direction</td>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayScheduleTutuban("tutuban_paco"); ?>
</tbody>
    </table>
</div>
</div>
<br>

</body>
<?php require_once('footer.php'); ?>
