<?php
// Include your database connection file here
include("admin/inc/config.php");

function generateTicketId() {
    global $conn;

    // Get the current year
    $year = date("Y");

    // Get the maximum ticket ID for the current year
    $maxTicketIdQuery = "SELECT MAX(CAST(SUBSTRING(ticket_id, 5) AS UNSIGNED)) as maxTicketCount FROM tickets WHERE YEAR(date) = $year";
    $result = mysqli_query($conn, $maxTicketIdQuery);
    $row = mysqli_fetch_assoc($result);
    $maxTicketCount = $row['maxTicketCount'];

    // Increment the count and format it as a 4-digit string
    $maxTicketCount++;
    $formattedCount = sprintf("%06d", $maxTicketCount);

    // Concatenate the year and count to form the ticket ID
    $ticketId = $year . $formattedCount;

    return $ticketId;
}

function generateTransactionId() {
    global $conn;
    
    // Get the current date and time from the database server
    $dateTimeQuery = "SELECT NOW() as currentDateTime";
    $result = mysqli_query($conn, $dateTimeQuery);
    $row = mysqli_fetch_assoc($result);
    $currentDateTime = $row['currentDateTime'];

    // Get the count of transactions for the current date and time
    $countQuery = "SELECT COUNT(*) as transactionCount FROM transactions WHERE date = '$currentDateTime'";
    $result = mysqli_query($conn, $countQuery);
    $row = mysqli_fetch_assoc($result);
    $transactionCount = $row['transactionCount'];

    // Increment the count and format it as a 4-digit string
    $transactionCount++;
    $formattedCount = sprintf("%04d", $transactionCount);

    // Concatenate the date and count to form the transaction ID
    $transactionId = str_replace(['-', ' ', ':'], '', $currentDateTime) . $formattedCount;

    return $transactionId;
}



// Check if the total parameter is set in the URL
if (isset($_GET['total'])) {
    // Get the values from the URL parameters
    $route = $_GET['route'];
    $date = $_GET['dateTrip'];
    $fare = $_GET['fare'];
    $total = $_GET['total'];
    $userId = $_GET['userId'];
    $userName = $_GET['userName'];
    $phone = $_GET['phone'];
    $numTickets = $_GET['ticket'];
    $transactionId = generateTransactionId();

    $pointsToAdd = floor($total / 12) * 0.25;

    $route = str_replace('ñ', 'ny', $route);

    $updatePointsQuery = "UPDATE accounts SET points = points + $pointsToAdd WHERE id = $userId";
    mysqli_query($conn, $updatePointsQuery);

    // Assuming 'wallet' is the column in the 'accounts' table where the user's wallet balance is stored
    $walletQuery = "UPDATE accounts SET wallet = wallet - $total WHERE id = $userId";
    mysqli_query($conn, $walletQuery);

    $transactionDate = date("Y-m-d H:i:s");
    $insertTransactionQuery = "INSERT INTO transactions (transaction_id, date, amount, user_id, status) VALUES ('$transactionId', '$transactionDate', $total, $userId, 'Payment')";
    mysqli_query($conn, $insertTransactionQuery);

    // Insert tickets into the database and generate receipt
    echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFC30B;
        }

        .receipt-container {
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

        strong {
            color: #333;
        }

        .ticket-details {
            margin-top: 20px;
            border-top: 1px dashed #333;
            padding-top: 10px;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button a:hover {
            background-color: #2980b9;
        }

        .phone{
            border-radius: 20px;
            background-color: #D3D3D3;
            width:128px;
            margin-left:auto;
            margin-right:auto;
            font-size:18px
        }

        .ref{
            padding-top:5px;
            font-size:12px;
        }

        .check img{
            margin-top: -50px;
        }
    </style>
    </head>
    <body>
        <div class='receipt-container'>
            <div class='check'>
            <center><img src='images/check.png' alt='PNR LOGO' width=70 height= 70><button type='button' class='close' onclick='closeReceipt()' aria-label='Close'><span aria-hidden='true'>&times;</span></button></center>
            </div>
            <p style='text-transform: uppercase;text-align:center;font-size:19px;'><strong>$userName</strong></p>
            <div class='phone'>
            <p style='text-align:center;'><strong> $phone</strong></p>
            </div>
            <p style='text-align:center;font-size:12px;'><strong>Paid via PNR Wallet</strong></p>
            <hr style='border: 1px solid black;border-radius: 5px;'>
            <p style='padding:8px 0;font-size:16px;'><strong>Amount <span style='float:right'>$total</span></strong></p>
            <hr style='border: 1px solid black;border-radius: 5px;'>
            <p style='font-size:16px;padding:8px 0;'><strong>Total Amount Paid <span style='float:right;font-size:25px;'>₱$total</span></strong></p>
            <div class='ref'>
            <p><strong>Ref No. $transactionId <span style='float:right'>$date</strong></span></p>
            </div>
            <!-- Include Bootstrap JS (place it at the end of your body tag) -->
            <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
            <script>
            function closeReceipt() {
                // Add any additional cleanup or action here
                window.location.href = 'welcome.php';
            }
        </script>
        </body>
        </html>";

    // Insert tickets into the database
    for ($i = 0; $i < $numTickets; $i++) {
        $ticketId = generateTicketId();
        $query = "INSERT INTO tickets (ticket_id, route, date, fare, user_id, passenger_name) VALUES ('$ticketId', '$route', '$date', '$fare', '$userId', '$userName')";
        mysqli_query($conn, $query);

        // Display ticket details in the receipt
        
    }
    // Close the database connection
    mysqli_close($conn);
}
?>
