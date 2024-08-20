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
    <script src="https://kit.fontawesome.com/d36de8f7e2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      .active{
        font-weight:900;
      } 
      .pnr{
        font-size:30px;
        font-weight:bold;
        line-height:80%;
        font-family:'Libre Baskerville',serif;"
      }
      .sub{
        z-index: 1;
        background-color:#FFF;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0) 0px 2px 4px -1px;
        padding-bottom:13px;
      }

      @media (max-width: 768px) {
        .time-container {
          display: none;
        }
        .pnr {
          font-size: 15px; /* Adjust the font-size for smaller screens */
        }
        .sub{
          padding-bottom:0px;
          position:relative;
        }
        .pnrlogo {
        width: 91px; /* Adjust the size according to your preference */
        height: 91px;
      }
      }     
      
      @media (min-width: 769px) {
            #side {
                display: none;
            }
        }
    </style>
</head>
<body>
<?php
  // Assume you have a variable $currentPage containing the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-md navbar-light fixed-top mainnav">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">PNR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($currentPage == 'transparency.php') ? 'active' : ''; ?>" aria-current="page" href="transparency.php">Transparency</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'gettingaround.php' || $currentPage == 'propertrain.php' || $currentPage == 'seniorcitizens.php' || $currentPage == 'toursandfestivals.php' || $currentPage == 'schedule.php' || $currentPage == 'faresandtickets.php' || $currentPage == 'route.php') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Getting Around
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?php echo ($currentPage == 'gettingaround.php') ? 'active' : ''; ?>" href="gettingaround.php">How To Ride</a></li>
            <li><a class="dropdown-item <?php echo ($currentPage == 'propertrain.php') ? 'active' : ''; ?>" href="propertrain.php">Proper Train Riding Habits</a></li>
            <!--<li><a class="dropdown-item" href="#">Senior Citizens</a></li>
            <li><a class="dropdown-item" href="#">Tours & Festivals</a></li>
            <li><a class="dropdown-item" href="#">Schedule</a></li>
            <li><a class="dropdown-item" href="#">Fares & Tickets</a></li>-->
            <li><a class="dropdown-item <?php echo ($currentPage == 'route.php') ? 'active' : ''; ?>" href="route.php">Route Map</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'station.php' || $currentPage == 'fares.php' || $currentPage == 'alabang.php' || $currentPage == 'sucat.php' || $currentPage == 'bicutan.php' || $currentPage == 'fti.php' || $currentPage == 'nichols.php' || $currentPage == 'edsa.php' || $currentPage == 'pasayroad.php' || $currentPage == 'buendia.php' || $currentPage == 'vitocruz.php' || $currentPage == 'sanandres.php' || $currentPage == 'paco.php' || $currentPage == 'pandacan.php' || $currentPage == 'santamesa.php' || $currentPage == 'espana.php' || $currentPage == 'laonlaan.php' || $currentPage == 'bluementritt.php' || $currentPage == 'tutuban.php') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Schedule & Fare
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?php echo ($currentPage == 'station.php') ? 'active' : ''; ?>" href="station.php">Stations</a></li>
            <li><a class="dropdown-item <?php echo ($currentPage == 'fares.php') ? 'active' : ''; ?>" href="fares.php">Fare</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'contacts.php') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About & Contact Us
          </a>
          <ul class="dropdown-menu" style="max-height: 300px;overflow-y: scroll;">
            <!--<li><a class="dropdown-item" href="#">Corporate Profile</a></li>
            <li><a class="dropdown-item" href="#">Board of Directors & Executives</a></li>
            <li><a class="dropdown-item" href="#">PNR in Philippine History</a></li>
            <li><a class="dropdown-item" href="#">PNR Historical Highlights</a></li>-->
            <li><a class="dropdown-item <?php echo ($currentPage == 'contacts.php') ? 'active' : ''; ?>" href="contacts.php">Help & Contact Us</a></li>
            <li><a class="dropdown-item <?php echo ($currentPage == 'careers.php') ? 'active' : ''; ?>" href="careers.php">Permanent Vacancy</a></li>
            <!--<li><a class="dropdown-item" href="#">Job Order Vacancy</a></li>
            <li><a class="dropdown-item" href="#">Advertising Inquiries</a></li>
            <li><a class="dropdown-item" href="#">Filming Inquiries</a></li>
            <li><a class="dropdown-item" href="#">Real Estate Management</a></li>
            <li><a class="dropdown-item" href="#">Train Acommodations</a></li>
            <li><a class="dropdown-item" href="#">Citizen's Charter</a></li>
            <li><a class="dropdown-item" href="#">Work Access Permit</a></li>
            <li><a class="dropdown-item" href="#">Application to lease PNR Property</a></li>
            <li><a class="dropdown-item" href="#">Application Form - <br>DOTr Free Train Ride Program</a></li>
            <li><a class="dropdown-item" href="#">Office of the General Manager <br>Clients Feedback</a></li>
            <li><a class="dropdown-item" href="#">Gender and Development</a></li>-->
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($currentPage == 'tracking.php') ? 'active' : ''; ?>" aria-current="page" href="tracking.php">Track Train</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo ($currentPage == 'welcome.php') ? 'active' : ''; ?>" aria-current="page" href="welcome.php">Buy Ticket</a>
        </li>
      </ul>
          <li class="navbar-nav nav-item dropdown" >
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=23 height= 23 style="margin:0 5px 0 5px;border-radius: 100%;" >  
            <?php echo '  ' .$firstname . ' ' . $lastname; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" id="side" href="wallet.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> My Wallet</a><li>
              <li><a class="dropdown-item" id="side" href="welcome.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z" /></svg> Buy Ticket</a><li>
              <li><a class="dropdown-item" id="side" href="history.php"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" /></svg> My Tickets</a><li>
              <li><a class="dropdown-item" href="user_edit_profile.php"><svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 576 512"><style>svg{fill:#333;margin-right:5px;}</style><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>  Edit Profile</a></li>
              <li><a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 0 512 512"><style>svg{fill:#333;margin-right:5px;}</style><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>  Log Out</a></li>
            </ul>
          </li>
    </div>
  </div>
  </nav>


    <div class="container-fluid mt-auto pt-5 sub">
    <div class="row pt-4">
      <div class="col-md-6">
        <table style="border:none;cursor:pointer;color:#174793;padding: 45px 10px 0px 10px;">
            <tr>
              <td style="padding-right:10px"><img src="images/PNR.png" alt="PNR LOGO" width=100 height= 100 class="pnrlogo"></td>
              <td><span class="pnr">Philippine National Railways</span><br><span style="font-size:14px;padding:0px;line-height: 0.5;color:black;font-weight:600;">Republic of the Philippines<br>Department of Transportation</span></td> 
            </tr>
          </table>
      </div>
        <div class="col-md-6 mt-4 text-end">
        <div class="row">
      <div class="col-md-12 time-container">
        <div class="time" id="pst-time">Loading...</div>
        <div class="date" id="pst-date">Loading...</div>
      </div>
    </div>
  </div>
 
  <script>
    function updatePST() {
      const options = {
        timeZone: 'Asia/Manila',
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric'
      };
      const pstDateTime = new Date().toLocaleString('en-US', options);
      document.getElementById('pst-time').textContent = `Philippine Standard Time`;
      document.getElementById('pst-date').textContent = pstDateTime;
    }

    updatePST();
    setInterval(updatePST, 1000);
  </script>
        </div>
      </div>
    </div>
</div>
<script>
    // Add JavaScript to highlight the active link
    document.addEventListener('DOMContentLoaded', function () {
      const currentLink = document.querySelector('.active');
      if (currentLink) {
        currentLink.classList.add('active');
      }
    });
  </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
