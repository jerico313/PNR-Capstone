<?php
// Include your database connection file if not included already
include("admin/inc/config.php");

// Fetch the announcements from the database
$query = "SELECT * FROM announcements";
$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch data from the result set and store it in an array
$announcements = [];
while ($row = mysqli_fetch_assoc($result)) {
    $announcements[] = $row;
}

// Free the result set
mysqli_free_result($result);

// Close the connection (if needed)
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #174793;
      font-family: 'Manrope', sans-serif;
    }
    .login-box {
      max-width: 900px; /* Use max-width for responsiveness */
      width: 100%; /* Adjust width to be responsive */
      padding: 20px;
      background-color: whitesmoke;
      border-radius: 15px;
      border-top: 100px solid #FFC30B;
      box-shadow: 0px 6px 12px rgba(50, 50, 93, 0.25), 0px 3px 7px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      align-self: center; /* Center the box in the flex container */
      margin: 25px auto;
    }
    .logo {
      margin: 0;
      text-align: left;
    }
    .image-container {
      text-align: right;
      position: right; /* Position the container absolutely */
      top: 30; /* Align to the top */
      right: 20px; /* Adjust the position as needed */
    }

    .image-container img {
      margin-bottom: 5px;
      margin-top: 25px;
    }

    .yellow-box {
    background-color: #FFC30B;
    border-radius: 15px 15px 0px 0px;
    height: auto;
    display: flex;
    align-items: center;
    padding: 10px 0px 0px 0px;
    width: 900px;
}

.blue-box {
    background-color: #FFF;
    border-radius: 0px 0px 15px 15px;
    height: auto;
}

.content {
    padding: 20px;
}
.contents {
    margin-center: 250px;
    padding-bottom: 90px;
}
.titl{
    position: absolute; 
    top: -70px; left: 50%; 
    transform: translateX(-50%); 
    font-size: 28px;
    font-weight:900;"
}
@media (max-width: 768px) {
            .titl{
                font-size:20px;
            }
        }
  </style>
</head>
<body>
<div class="lol" style="margin:0 auto;">
<div class="container-fluid">
  <div class="row">  
    <center>
  <div class="col-md-6 col-sm-12">
      <div class="login-box" style="position: relative;">
        <div class="logo" style="text-align: center;">
          <img src="images/PNR.png" width="90" height="90" style="position: absolute; top: -100px; left: 0; background-color: #FFC30B; padding: 10px; border-radius: 50%;">
          <p class="titl">ANNOUNCEMENT</p>
          <img src="images/DOT.png" width="90" height="90" style="position: absolute; top: -100px; right: 0; background-color: #FFC30B; padding: 10px; border-radius: 50%;">
        </div>
        <div class="announcement" style="text-align: left;">
    <?php
    // Loop through the announcements and display them
    foreach ($announcements as $announcement) {
        echo "<p>" . htmlspecialchars_decode($announcement['description']) . "</p>";
    }
    ?>
   </center>
</div>
      </div>
    </div>
  </div>
</div>
  </div>