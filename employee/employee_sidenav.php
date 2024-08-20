<?php require_once('header.php'); ?>

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

        .active-link {
    background-color: #AAAAAA;
    border-radius: 6px;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    color: #174793 !important;
    box-shadow: inset 0px 2px 5px -1px rgba(0,0,0,0.75);
        }
    </style>
</head>
<body>
<?php
  // Assume you have a variable $currentPage containing the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar">
    <center>
    <p style="font-size: 20px;color: #fff;">DASHBOARD</p>
    </center>
    <hr style="background-color:#fff;">
    <div class="name ">
    <img src="../assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=40 height= 40 style="margin:0 10px 0 10px;border-radius: 100%;" ><?php echo '  ' .$firstname . ' ' . $lastname; ?>
    <hr style="background-color:#fff;">
</div>
    <div class="box overflow-auto">
    <a href="dashboard.php" class="<?php echo ($currentPage == 'dashboard.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 576 512"><style>svg{fill: #fff;;margin-right:5px;margin-left:5px;}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Home</a>
    <a href="employee_edit_profile.php" class="<?php echo ($currentPage == 'employee_edit_profile.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 640 512"><style>svg{fill: #fff;}</style><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg> My Profile</a>
    <a href="employee_change_password.php" class="<?php echo ($currentPage == 'employee_change_password.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 640 512"><style>svg{fill: #fff;}</style><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> Change Password</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add JavaScript to highlight the active link
    document.addEventListener('DOMContentLoaded', function () {
      const currentLink = document.querySelector('.active-link');
      if (currentLink) {
        currentLink.classList.add('active-link');
      }
    });
  </script>
</body>
</html>