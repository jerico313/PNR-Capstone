<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to Bootstrap 5 CSS (use the latest version from the official website) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

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

    .sidebar {
        width: 100%; /* Make sidebar take full width on smaller screens */
        left: 0; /* Show the sidebar on smaller screens */
      }

      .sidebar a {
        text-align: center;
        padding: 10px;
      }
}
  </style>
  </style>
</head>

<body>
  
  <?php
  // Assume you have a variable $currentPage containing the current page filename
  $currentPage = basename($_SERVER['PHP_SELF']);
  ?>

  <div class="sidebar" style="z-index: 1;">
    <center>
      <p style="font-size: 20px;">DASHBOARD</p>
    </center>
    <hr>
    <img src="assets/uploads/<?php echo $profile_picture; ?>" alt="profile" width=40 height=40
      style="margin: 0 10px 0 10px; border-radius: 100%;"><?php echo $firstname . ' ' . $lastname; ?>
    <hr>
    <p style="padding-left: 10px; color:#333333;"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"
        style="margin: 0 10px 0 10px;"><style>
          svg {
            fill: #333
          }
        </style><path
          d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z" />
        </svg>Points: <?php echo $points; ?></p>
        <a href="wallet.php" class="<?php echo (in_array($currentPage, ['wallet.php', 'cashin.php'])) ? 'active-link' : ''; ?>"><svg 
        xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"
        style="margin: 0 10px 0 10px;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path 
          d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
        </svg>My Wallet: <?php echo $wallet; ?></a>
    <a href="welcome.php" class="<?php echo ($currentPage == 'welcome.php') ? 'active-link' : ''; ?>"><svg
        xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"
        style="margin: 0 10px 0 10px;"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path
          d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z" />
        </svg>Buy Ticket</a>
    <a href="history.php" class="<?php echo ($currentPage == 'history.php') ? 'active-link' : ''; ?>"><svg
        xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"
        style="margin: 0 10px 0 10px"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path
          d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" />
        </svg>My Tickets</a>
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
