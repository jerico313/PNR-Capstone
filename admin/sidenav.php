<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navbar with Bootstrap 5</title>
    <!-- Link to Bootstrap 5 CSS (use the latest version from the official website) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style-css.css">
    <style>
      .sidebar{
        
      }
        .name{
            color: #fff;
            margin-top:auto;
            margin-bottom:auto;
        }
        hr{
            border: 1px solid #fff;
        }

        .box{
            border: 0px solid #fff;
            height: 73%;
        }
         .dropdown-btn {
            padding: 10px 10px;
  text-decoration: none;
  color: #FFF;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  font-weight: 900;
  transition: padding-left 0.2s ease-in-out;
    -moz-transition: padding-left 0.2s ease-in-out;
    -webkit-transition: padding-left 0.2s ease-in-out;
    -o-transition: padding-left 0.2s ease-in-out;
}

.dropdown-btn:hover {
    background-color: #AAAAAA;
    box-shadow: 0px 2px 5px -1px rgba(0,0,0,0.75);
    border-radius: 6px;
    color: #174793;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    padding-left: 13px;
}

.active-link {
    background-color: #AAAAAA;
    border-radius: 6px;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    color: #174793 !important;
    box-shadow: inset 0px 2px 5px -1px rgba(0,0,0,0.75);
        }

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color:  #192b49;
    border-radius: 8px;
    padding-top:7px;
    padding-bottom:7px;
  margin-left: 5px;
  margin-right: 5px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

    </style>
</head>
<body>
<?php
  // Assume you have a variable $currentPage containing the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar" style="color:#fff;">
    <center>
    <p style="font-size: 20px;color: #fff;">DASHBOARD</p>
    </center>
    <hr style="background-color:#fff;">
    <img src="../assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=40 height= 40 style="margin:0 10px 0 10px;border-radius: 100%;" ><?php echo '  ' .$firstname . ' ' . $lastname; ?>
    <hr>
    <div class="box overflow-auto">
    <a href="dashboard.php" class="<?php echo ($currentPage == 'dashboard.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><style>svg{fill: #fff;;margin-right:5px;margin-left:5px;padding-bottom:3px;}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Home</a>
    <a href="reg_employee.php" class="<?php echo ($currentPage == 'reg_employee.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 640 512"><style>svg{fill: #fff;}</style><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg> Registered Employee</a>
    <a href="reg_passenger.php" class="<?php echo ($currentPage == 'reg_passenger.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 640 512"><style>svg{fill: #fff;}</style><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> Registered Passenger</a>
    <button class="dropdown-btn" ><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill: #fff;}</style><path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/></svg> Schedule    <i class="fa fa-caret-down"></i></a> 
    </button>
    <div class="dropdown-container">
        <a href="schedule_alabang.php" class="<?php echo ($currentPage == 'schedule_alabang.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Alabang</a>
        <a href="schedule_sucat.php" class="<?php echo ($currentPage == 'schedule_sucat.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Sucat</a>
        <a href="schedule_bicutan.php" class="<?php echo ($currentPage == 'schedule_bicutan.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Bicutan</a>
        <a href="schedule_FTI.php" class="<?php echo ($currentPage == 'schedule_FTI.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> FTI</a>
        <a href="schedule_nichols.php" class="<?php echo ($currentPage == 'schedule_nichols.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Nichols</a>
        <a href="schedule_EDSA.php" class="<?php echo ($currentPage == 'schedule_EDSA.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> EDSA</a>
        <a href="schedule_pasayroad.php" class="<?php echo ($currentPage == 'schedule_pasayroad.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Pasay Road</a>
        <a href="schedule_buendia.php" class="<?php echo ($currentPage == 'schedule_buendia.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Buendia</a>
        <a href="schedule_vitocruz.php" class="<?php echo ($currentPage == 'schedule_vitocruz.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Vito Cruz</a>
        <a href="schedule_sanandres.php" class="<?php echo ($currentPage == 'schedule_sanandres.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> San Andres</a>
        <a href="schedule_paco.php" class="<?php echo ($currentPage == 'schedule_paco.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Paco</a>
        <a href="schedule_pandacan.php" class="<?php echo ($currentPage == 'schedule_pandacan.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Pandacan</a>
        <a href="schedule_santamesa.php" class="<?php echo ($currentPage == 'schedule_santamesa.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Santa Mesa</a>
        <a href="schedule_españa.php" class="<?php echo ($currentPage == 'schedule_españa.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> España</a>
        <a href="schedule_laonlaan.php" class="<?php echo ($currentPage == 'schedule_laonlaan.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Laon Laan</a>
        <a href="schedule_bluementritt.php" class="<?php echo ($currentPage == 'schedule_bluementritt.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Bluementritt</a>
        <a href="schedule_tutuban.php" class="<?php echo ($currentPage == 'schedule_tutuban.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M86.8 48c-12.2 0-23.6 5.5-31.2 15L42.7 79C34.5 89.3 19.4 91 9 82.7S-3 59.4 5.3 49L18 33C34.7 12.2 60 0 86.8 0H361.2c26.7 0 52 12.2 68.7 33l12.8 16c8.3 10.4 6.6 25.5-3.8 33.7s-25.5 6.6-33.7-3.7L392.5 63c-7.6-9.5-19.1-15-31.2-15H248V96h40c53 0 96 43 96 96V352c0 30.6-14.3 57.8-36.6 75.4l65.5 65.5c7.1 7.1 2.1 19.1-7.9 19.1H365.3c-8.5 0-16.6-3.4-22.6-9.4L288 448H160l-54.6 54.6c-6 6-14.1 9.4-22.6 9.4H43c-10 0-15-12.1-7.9-19.1l65.5-65.5C78.3 409.8 64 382.6 64 352V192c0-53 43-96 96-96h40V48H86.8zM160 160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32H288c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H160zm32 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> Tutuban</a>
    </div>
    <a href="stations.php" class="<?php echo ($currentPage == 'stations.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 384 512"><style>svg{fill: #fff;}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> Stations</a>
    <a href="fare.php" class="<?php echo ($currentPage == 'fare.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"><style>svg{fill: #fff;}</style><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> Fare</a>
    <a href="trains.php" class="<?php echo ($currentPage == 'trains.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 448 512"><style>svg{fill: #fff;}</style><path d="M96 0C43 0 0 43 0 96V352c0 48 35.2 87.7 81.1 94.9l-46 46C28.1 499.9 33.1 512 43 512H82.7c8.5 0 16.6-3.4 22.6-9.4L160 448H288l54.6 54.6c6 6 14.1 9.4 22.6 9.4H405c10 0 15-12.1 7.9-19.1l-46-46c46-7.1 81.1-46.9 81.1-94.9V96c0-53-43-96-96-96H96zM64 96c0-17.7 14.3-32 32-32H352c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96zM224 288a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg> Trains</a>
    <a href="tickets.php" class="<?php echo ($currentPage == 'tickets.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><style>svg{fill: #fff;}</style><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"/></svg> Tickets</a>
    <a href="sliders.php" class="<?php echo ($currentPage == 'sliders.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><style>svg{fill: #fff;}</style><path d="M160 32c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320H328 280 200c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V344c0 75.1 60.9 136 136 136H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-48.6 0-88-39.4-88-88V120z"/></svg> Manage Sliders</a>
    <a href="announcement.php" class="<?php echo ($currentPage == 'announcement.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"><style>svg{fill: #fff;}</style><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/></svg> Announcements</a>
    <a href="inquiry.php" class="<?php echo ($currentPage == 'inquiry.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg> Inquiry</a>
    <a href="comments_complaints.php" class="<?php echo ($currentPage == 'comments_complaints.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2 0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.3-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9l0 0 0 0-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg> Comments</a>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
<script>
    // Add JavaScript to highlight the active link
    document.addEventListener('DOMContentLoaded', function () {
      const currentLink = document.querySelector('.active-link');
      if (currentLink) {
        currentLink.classList.add('active-link');
      }
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all dropdown links and the dropdown container
        var dropdownLinks = document.querySelectorAll(".dropdown-container a");
        var dropdownContainer = document.querySelector(".dropdown-container");

        // Check if any dropdown link or its content is active
        for (var i = 0; i < dropdownLinks.length; i++) {
            if (dropdownLinks[i].classList.contains("active-link")) {
                // Set display to block if active
                dropdownContainer.style.display = "block";
                break; // Exit the loop if one is active
            }
        }
    });
</script>

</body>
</html>

