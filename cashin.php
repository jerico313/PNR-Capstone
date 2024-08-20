<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

include("admin/inc/config.php"); 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        $wallet = $user_data['wallet']; 
        $points = $user_data['points'];
    } else {
        $profile_picture = 'default_profile.jpg';
    }
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

if (isset($_SESSION['user_id'])) {
    include('header2.php');
    include('sidenav.php');
} else {
    include('header.php');
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Wallet</title>
    <link rel="stylesheet" type="text/css" href="style-css.css">
    <style>
        .sub{
        z-index: 1;
        position:fixed;
        background-color:#FFF;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0) 0px 2px 4px -1px;
        padding-bottom:13px;
      }
      
      .btn{
        border:1px solid black;
        width:8vw;
        height:50px;
        font-size:25px;
      }
      
        #loadingOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        align-items: center;
        justify-content: center;
        z-index: 2000; /* Set a higher z-index value */
        }
        .lds-grid {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        }
        .lds-grid div {
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #FFC30B;
        animation: lds-grid 1.2s linear infinite;
        }
        .lds-grid div:nth-child(1) {
        top: 8px;
        left: 8px;
        animation-delay: 0s;
        }
        .lds-grid div:nth-child(2) {
        top: 8px;
        left: 32px;
        animation-delay: -0.4s;
        }
        .lds-grid div:nth-child(3) {
        top: 8px;
        left: 56px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(4) {
        top: 32px;
        left: 8px;
        animation-delay: -0.4s;
        }
        .lds-grid div:nth-child(5) {
        top: 32px;
        left: 32px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(6) {
        top: 32px;
        left: 56px;
        animation-delay: -1.2s;
        }
        .lds-grid div:nth-child(7) {
        top: 56px;
        left: 8px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(8) {
        top: 56px;
        left: 32px;
        animation-delay: -1.2s;
        }
        .lds-grid div:nth-child(9) {
        top: 56px;
        left: 56px;
        animation-delay: -1.6s;
        }
        @keyframes lds-grid {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        }
        @media (max-width: 768px) {
        .time-container {
          display: none;
        }
        .pnr {
          font-size: 20px; /* Adjust the font-size for smaller screens */
        }
        .sub{
          padding-bottom:0px;
          position:relative;
        }
        .pnrlogo {
        width: 91px; /* Adjust the size according to your preference */
        height: 91px;
        }
        .btn{
                width:50px;
                font-size:11px;
            }
      }
    </style>

</head>
<body>
    <div class="content">
    <div class="back" style="padding-bottom:10px;">
    <a class="nav-link active" style="color: black; padding: 10px;" aria-current="page" href="wallet.php">
    &nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-arrow-left-circle" viewBox="0 0 16 16" style="fill: black;">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>&nbsp;&nbsp;BACK
    </a>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-box yellow-box">
                        <p><strong>Cash In</strong></p>
                    </div>
                    <div class="custom-box blue-box">
                    <div class="balance">
                    <p style="font-weight:600;font-size:15px;padding-top:20px;padding-left:25px;">Cash in value (₱)</p>
                    </div>
                    <hr>
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col pt-3">
                                <center>
                                    <button class="btn" onclick="updateInputAmount(300)">300</button>
                                </center>
                                </div>
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(500)">500</button>
                                </center>
                                </div>
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(750)">750</button>
                                </center>
                                </div>   
                                <div class="col pt-3">
                                <center>
                                    <button class="btn" onclick="updateInputAmount(1000)">1,000</button>
                                </center>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col pt-3">
                                <center>
                                    <button class="btn "  onclick="updateInputAmount(1500)">1,500</button>
                                </center>
                                </div>
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(2000)">2,000</button>
                                </center>
                                </div> 
                                <div class="col pt-3">
                                <center>
                                    <button class="btn" onclick="updateInputAmount(3000)">3,000</button>
                                </center>
                                </div>  
                                <div class="col pt-3">
                                <center>
                                    <button class="btn" onclick="updateInputAmount(4000)">4,000</button>
                                </center>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom:15px;">
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(5000)">5,000</button>
                                </center>
                                </div>
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(6000)">6,000</button>
                                </center>
                                </div> 
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(7000)">7,000</button>
                                </center>
                                </div> 
                                <div class="col pt-3">
                                <center>
                                    <button class="btn " onclick="updateInputAmount(8000)">8,000</button>
                                </center>
                                </div>    
                            </div>
                        <hr>
                        <form id="payNowForm" action="payment.php" method="GET">
                        <div class="balance">
                            <p style="font-weight:600;font-size:15px;padding-left:25px;">Input Amount (₱)</p>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="0" style="color:#174793;font-size:30px;margin:0 auto;border:solid black 1px;font-weight:600;width:95%;" required>
                        </div>
                        <hr>
                        <p style="font-weight:600;font-size:15px;padding-left:25px;">Payment</p>
                        <select class="form-select" aria-label="Default select example" style="width:95%;margin:0 auto;border:solid black 1px;">
                        <option value="gcash">GCash</option>
                        </select>
                        <hr>
                        <p style="font-weight:600;font-size:15px;padding-left:25px;color:#737373;">Cash In<span id="cashin"style="float:right;padding-right:25px;">₱0.00</span></p>
                        <p style="font-weight:600;font-size:18px;padding-left:25px;">Total Payment<span id="totalpayment"style="color:#174793;float:right;padding-right:25px;font-size:18px;">₱0.00</span></p>
                        <div class="modal-footer text-center border-0" style="padding:10px 0;">
                            <button type="submit" id="payNowButton" class="btn button-20" style="margin: 0 auto;width:95%;font-size:20px;">Pay Now</button>
                        </div>
                        <br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div id="loadingOverlay">
    <div class="lds-grid">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<script>
    document.getElementById('payNowButton').addEventListener('click', function () {
        // Get the entered value
        let enteredValue = parseFloat(document.getElementById('amount').value.replace(/[^0-9.]/g, ''));

        // Check if the entered value is greater than zero
        if (enteredValue > 0) {
            document.getElementById('loadingOverlay').style.display = 'flex';

            setTimeout(function () {
                // Hide loading overlay
                document.getElementById('loadingOverlay').style.display = 'none';

                // Trigger the second modal to show
                $('#secondModal').modal('show');
            }, 10000);
        } else {
            alert('Please enter a valid amount before proceeding.');
        }
    });
</script>

<script>
function deleteTransaction(transactionId) {
    // Set the fare ID to be deleted
    $('#deleteModal').data('transactionId', transactionId);
    // Open the delete confirmation modal
    $('#deleteModal').modal('show');
}

function confirmDelete() {
    // Get the fare ID to be deleted
    var transactionId = $('#deleteModal').data('transactionId');

    // Add logic for deleting a fare
    $.ajax({
        url: 'delete_transaction.php',
        method: 'POST',
        data: { transactionId: transactionId },
        success: function(response) {
            // Log the response from the server
            console.log(response);

            // If deletion is successful, remove the row from the table
            if (response === "Transaction deleted successfully") {
                location.reload(); // Reload the page
            } else {
                // If there's an unexpected response, show an alert
                alert('Unexpected response: ' + response);
            }

            // Close the delete confirmation modal
            $('#deleteModal').modal('hide');
        },
        error: function(error) {
            // Log any errors to the console
            console.log(error);

            alert('Error: ' + error.statusText);
        }
    });
}
</script>
<script>
</script>
<script>
    document.getElementById('amount').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Prevent the default behavior of the Enter key

        // Get the entered value
        let enteredValue = parseFloat(this.value.replace(/[^0-9.]/g, ''));

        // Check if the entered value is a valid number
        if (!isNaN(enteredValue)) {
            // Format the entered value with two decimal places and commas for thousands
            this.value = '₱' + enteredValue.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            document.getElementById('cashin').innerText = '₱' + enteredValue.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            document.getElementById('totalpayment').innerText = '₱' + enteredValue.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    }
});
</script>
<script>
    function updateInputAmount(amount) {
    // Update the input field with the selected amount formatted to two decimal places and with peso sign
    document.getElementById('amount').value = '₱' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

    // Display the amount in the "cashin" and "totalpayment" elements
    document.getElementById('cashin').innerText = '₱' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    document.getElementById('totalpayment').innerText = '₱' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}
</script>
<script>
function submitForm() {
    // Get the entered value
    let enteredValue = parseFloat(document.getElementById('amount').value.replace(/[^0-9.]/g, ''));

    // Check if the entered value is a valid number
    if (!isNaN(enteredValue)) {
        // Set the hidden input field value
        document.getElementById('hiddenAmount').value = enteredValue;

        // Submit the form
        document.getElementById('payNowForm').submit();
    } else {
        alert('Please enter a valid amount.');
    }
}
</script>

</body>
</html>


