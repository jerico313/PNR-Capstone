<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden; /* Hide overflow until the animation is complete */
        }

        .loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgb(255,116,0);
            background: radial-gradient(circle, rgba(255,116,0,1) 0%, rgba(255,116,0,1) 1%, rgba(255,195,11,1) 100%);
            z-index: 1000; /* Ensure it's above other content */
            animation: fadeIn 1.5s ease-in-out; /* Animation for fading in */
        }
        

        img {
            max-width: 200px; /* Adjust the size of your logo as needed */
            animation: logoScale 1.5s ease-in-out; /* Optional: Add a scaling animation */
        }

        .main-content {
            display: none; /* Hide the main content initially */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes logoScale {
            0% {
                transform: scale(0.5);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <!-- Loading screen with logo -->
    <div class="loading-screen">
        <img src="images/PNR.png" alt="PNR Logo">
    </div>
    <script>
        setTimeout(function () {
            window.location.href = "home.php"; // Replace with your main page URL
        }, 3000); // Delay for 3 seconds (adjust as needed)
    </script>
</body>
</html>
