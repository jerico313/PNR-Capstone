<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navbar with Bootstrap 5</title>
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
    <p style="font-size: 20px;color: #fff;">ADMIN DASHBOARD</p>
    </center>
    <hr style="background-color:#fff;">
    <div class="name" style="  font-family: Manrope;">
    <img src="../assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=40 height= 40 style="margin:0 10px 0 10px;border-radius: 100%;" ><?php echo '  ' .$firstname . ' ' . $lastname; ?>
</div>
<hr style="background-color:#fff;">
    <div class="box overflow-auto">
    
    <a href="dashboard.php" class="<?php echo ($currentPage == 'dashboard.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 576 512"><style>svg{fill: #fff;;margin-right:5px;margin-left:5px;}</style><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> Home</a>
    <a href="admin_edit_profile.php" class="<?php echo ($currentPage == 'admin_edit_profile.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" style="margin: 0 10px 0 10px"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#fafcff}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>My Profile</a>
    <a href="admin_change_password.php" class="<?php echo ($currentPage == 'admin_change_password.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" style="margin: 0 10px 0 10px"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f1f4f8}</style><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>Change Password</a>
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