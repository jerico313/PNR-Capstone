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
            <li><a class="dropdown-item" href="station.php">Stations</a></li>
            <li><a class="dropdown-item" href="fares.php">Fare</a></li>
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
      </ul>
          <li class="navbar-nav nav-item dropdown" >
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg> Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#555;margin-right:5px;}</style><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg> Log In</a></li>
              <li><a class="dropdown-item" href="signup.php"><svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>Sign Up</a></li>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
