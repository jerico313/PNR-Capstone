<?php

if (isset($_GET['ukayra_id'])) {
    echo "<html lang='en'>
        <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFC30B;
        }

        .container {
            max-width: 400px;
            margin: 70px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 1px 4px 11px 2px rgba(0,0,0,0.24);
            -webkit-box-shadow: 1px 4px 11px 2px rgba(0,0,0,0.24);
            -moz-box-shadow: 1px 4px 11px 2px rgba(0,0,0,0.24);
            border-radius: 10px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            margin: 10px 0;
            color: #555;
            line-height: 1.4;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #2980b9;
        }

        .check img{
            margin-top: -50px;
        }
        </style>
        </head>
        <body>
            <div class='container'>
            <div class='check'>
            <center><img src='images/check.png' alt='PNR LOGO' width=70 height= 70><button type='button' class='close' onclick='closeReceipt()' aria-label='Close'><span aria-hidden='true'>&times;</span></button></center>
            </div>
                <h2>Payment Details</h2>";

    echo "UkayraID: " . $_GET['ukayra_id'] . "<br />";

    if (isset($_GET['paymongo_id'])) {
        echo "PaymongoID: " . $_GET['paymongo_id'] . "<br />";
    }

    if (isset($_GET['method'])) {
        echo "Method: " . $_GET['method'] . "<br />";
    }

    if (isset($_GET['message'])) {
        echo "Error Message: " . $_GET['message'];
    }

    echo "<script>
            function closeReceipt() {
                // Add any additional cleanup or action here
                window.location.href = 'welcome.php';
            }
        </script>
        </body>
        </html>";
} else {
    echo "Success Page";
    echo " <a href='/dashboard.php' style='background-color:transparent;border:1px solid black;'>Close</a>";
}
?>
