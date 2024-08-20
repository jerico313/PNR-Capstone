<?php
session_start();

include("inc/db.php");

// Check if employee user is not logged in
if (!isset($_SESSION['employee_id'])) {
    // Redirect to the login page if not logged in
    header("Location: employee_signin.php");
    exit();
}

$emp_id = $_SESSION['employee_id'];

// Retrieve employee data from the database
$sql = "SELECT * FROM employees WHERE employee_id = $emp_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch admin data
    $emp_data = mysqli_fetch_assoc($result);
    $profile_picture = $emp_data['profile_picture'];
} else {
    // Handle the case where admin data is not found
    $profile_picture = 'default_profile.jpg';
}

$firstname = $_SESSION['emp_firstname'] ?? '';
$lastname = $_SESSION['emp_lastname'] ?? '';

mysqli_close($conn);
?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style-css.css"></head>
    <style>
      svg{
        fill:#FFF;
        margin-right:5px;
      }

      .pnr{
        font-size:25px;
        font-weight:bold;
        line-height:80%;
        font-family:'Libre Baskerville',serif;"
      }
      
      @media (max-width: 768px) {

            #side {
                display: block;
            }

            .pnr {
          font-size: 18px; /* Adjust the font-size for smaller screens */
        }

        .nav{
          overflow:auto;
        }

        .pnrlogo {
        width: 60px; /* Adjust the size according to your preference */
        height: 60px;
      }
        }

        @media (min-width: 769px) {
            #side {
                display: none;
            }
        }
    </style>
    </style>
<body>

<nav class="navbar navbar-expand-md navbar-light fixed-top mainnav">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">
    <div class="col-md-6">
        <table style="border:none;cursor:pointer;color:#174793;padding: 45px 10px 15px 10px;">
            <tr>
              <td style="padding-right:10px"><img src="images/PNR.png" alt="PNR LOGO" width=75 height= 75 class="pnrlogo"></td>
              <td class="pnr">Philippine National Railways<br><span style="font-size:14px;padding:0px;line-height: 0.5;color:black;font-weight:600;">Republic of the Philippines<br>Department of Transportation</span></td> 
            </tr>
          </table>
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
      </ul>
      <li class="navbar-nav nav-item dropdown" >
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="images/<?php echo $profile_picture; ?>" alt="profile" width=23 height= 23 style="margin:0 5px 0 5px;border-radius: 100%;" >  
            <?php echo '  ' .$firstname . ' ' . $lastname; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="max-height: 300px;overflow: auto;">
              <li><a class="dropdown-item" id="side" href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><style>svg{fill: #fff;margin-right:5px;margin-left:5px;padding-bottom:3px;}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Home</a></li>
              <li><a class="dropdown-item" id="side" href="tickets.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"/></svg> Tickets</a></li>
              <li><a class="dropdown-item" id="side" href="validate_ticket.php"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z"/></svg> Scan Ticket</a><li>
              <li><a class="dropdown-item" id="side" href="train_tracking.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 384 512"><style>svg{fill: #fff;}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> Train Tracking</a><li>  
              <li><a class="dropdown-item" href="employee_edit_profile.php"><svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 576 512"><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>  Edit Profile</a></li>
              <li><a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 512 512"><style>svg{fill:#FFF;margin-right:5px;}</style><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>  Log Out</a></li>
            </ul>
          </li>
    </div>
  </div>
</nav>

<?php 

include("sidenav.php");

?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>

