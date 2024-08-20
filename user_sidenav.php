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
    .sidebar {
      width: 250px; /* Set a fixed width for the sidebar */
      height: 100%;
      position: fixed;
      top: 0;
      left: -250px; /* Hide the sidebar by default on smaller screens */
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 20px;
      margin-top: 181px;
    }

    .sidebar a {
      text-decoration: none;
      font-size: 18px;
      color: #333;
      display: block;
      padding: 10px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #c99b13;
      color: #fff;
    }

    .active-link {
      background-color: rgb(205, 93, 3);
    border-radius: 6px;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    color: #FFF !important;
    box-shadow: inset 0px 1px 3px -1px rgba(0,0,0,0.75);
    }
@media (max-width: 768px) {
    .content {
        margin-left: 0;
    }
}
  </style>
</head>
<body>
<?php
  // Assume you have a variable $currentPage containing the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);
  ?>
<div class="sidebar" style="z-index: 1;">
    <center>
    <p style="font-size: 20px;">EDIT PROFILE</p>
    </center>
    <hr>
    <img src="assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=40 height= 40 style="margin:0 10px 0 10px;border-radius: 100%;" ><?php echo $firstname . ' ' . $lastname; ?>
    <hr>
    <a href="user_edit_profile.php" class="<?php echo ($currentPage == 'user_edit_profile.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" style="margin: 0 10px 0 10px"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>My Profile</a>
    <a href="user_change_password.php" class="<?php echo ($currentPage == 'user_change_password.php') ? 'active-link' : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"style="margin: 0 10px 0 10px" ><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>Change Password</a>
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