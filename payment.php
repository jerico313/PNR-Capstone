<?php
session_start();

include("admin/inc/config.php");

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
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Extract numerical value from the amount parameter
    $amount = isset($_GET['amount']) ? (float) str_replace(['₱', ',', ' '], '', $_GET['amount']) : 0;

    // Update the wallet in the database
    $updateSql = "UPDATE accounts SET wallet = wallet + $amount WHERE id = $user_id";
    $updateResult = mysqli_query($conn, $updateSql);
    

    if ($updateResult) {

        $transactionId = generateTransactionId();
        $transactionDate = date("Y-m-d H:i:s");
        $insertTransactionQuery = "INSERT INTO transactions (transaction_id, date, amount, user_id, status) VALUES ('$transactionId', '$transactionDate', $amount, $user_id, 'Cash In')";
        $insertTransactionResult = mysqli_query($conn, $insertTransactionQuery);
    
        if (!$insertTransactionResult) {
            // Handle the case where the transaction insertion fails
            echo "Error inserting into transactions table: " . mysqli_error($conn);
            die();
        }
        // The amount has been successfully inserted into the database

        // Rest of your payment handling code...

        $url = "https://api4wrd-v1.kpa.ph/paymongo/v1/create"; // you will need an app_key, get it from -> https://api4wrd.kpa.ph/register
        $redirect = [
            "success" => "https://pnrgotickets.online/success.php",
            "failed" => "https://pnrgotickets.online/failed.php"
        ];

        $billing = [
            "email" => "unknownpassenger@gmail.com",
            "name" =>  "Unknown Passenger",
            "phone" =>  "09*********",
            "address" => [
                "line1" =>  "Salalilla St.",
                "line2" =>  "Milagrosa",
                "city" =>  "Quezon City",
                "state" => "Manila",
                "postal_code" =>  "1109",
                "country" =>  "PH"
            ]
        ];

        $attributes = [
            "livemode" => false,
            "type" => "gcash",
            "amount" => (int) ($amount * 100),
            "currency" => "PHP",
            "redirect" => $redirect,
            "billing" => $billing,
        ];

        // FYI = You can use the PAYMONGO secret key & password below;
        // "secret_key" => "sk_test_HL7BiubdGVbXHXCt2nhf8fNE"
        // "password" => "your-paymongo-password" 
        // sample

        $source = [
            "app_key" => "f3f67ec793b54c87abc1d7d0070c4fbfa7149897", // get it from -> https://api4wrd.kpa.ph/register
            "secret_key" => "sk_test_9g8PFQ9STUaPW1eFjQwtbsmk", // secret key from paymongo - be sure your account is fully activated
            "password" => "Ecoangolluan@313", // your paymongo account password - be sure your account is fully activated
            "data" => [
                "attributes" => $attributes
            ]
        ];

        $jsonData = json_encode($source);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // disable ssl
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        $resData = json_decode($result, true);

        if ($resData["status"] == 200) {
            header("Location: " . $resData["url_redirect"]);
        } else {
            echo $result;
        }

        die();
    } else {
        // Error occurred while updating the database
        echo "Error updating the database: " . mysqli_error($conn);
    }
} else {
    // Handle the case where the total parameter is not set
    echo "Total parameter not set.";
}

mysqli_close($conn);
?>
