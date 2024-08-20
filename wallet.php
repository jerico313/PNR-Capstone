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

function displayTransactions() {
    include("admin/inc/config.php"); 

    // Retrieve the current user's id
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM transactions WHERE user_id = $user_id ORDER BY transaction_id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['transaction_id'] . "'>";
            echo "<td style='text-align:center;'>" . $row['transaction_id'] . "</td>";
        
            $status = $row['status'];
            $fontColor = ($status == 'Payment') ? 'red' : (($status == 'Cash In') ? '#089000' : 'black');
            echo "<td style='text-align:center; color: $fontColor;'>" . $status . "</td>";
            echo "<td>";
            echo '<center><button class="btn btn-danger btn-sm" onclick="deleteTransaction(' . $row['transaction_id'] . ')">Delete</button></center>';
            echo "</td>";
            echo "</tr>";
            $count++;
        }        
    }

    $conn->close();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <style>
    .sub{
        z-index: 1;
        position:fixed;
        background-color:#FFF;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0) 0px 2px 4px -1px;
        padding-bottom:13px;
      }
    
    tr {
    cursor: pointer;
}

    .yellow{
    box-shadow: 0px 1px 3px -1px rgba(0,0,0,0.75);
    }

    .balance:hover{
        font-size:35px;
    }
        .table {
    width: 94% !important;
}

.bord {
    border: 1px solid white !important;
    background: #D3D3D3;
    color: black;
}

.table-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
    background-color: whitesmoke !important;
    color: black !important;
}

.dataTables_length{
    padding: 20px 10px 20px 30px;
}

.dataTables_filter{
    padding: 20px 30px;
}

.dataTables_info{
    padding: 20px 30px;
}

.dataTables_paginate{
    padding: 10px 30px 20px 30px;
}

.page-item:not(:first-child) .page-link {
    margin-left: -1px;
}
.page-item:not(:first-child) .page-link {
    margin-left: -1px;
}
.active>.page-link, .page-link.active {
    z-index: 3;
    color: #fff;
    background-color: #174793;
    border-color: #174793;
}

.paginate_button{
    color: #174793;
}

.page-link {
    color: #174793;
}

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
    </style>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-box yellow-box">
                        <p><strong>My Wallet</strong></p>
                    </div>
                    <div class="custom-box blue-box">
                    <div class="balance">
                    <p style="font-weight:900;font-size:25px;text-align:center;padding-top:20px;">Available Balance <br><span style="font-size:35px;">₱ <?php echo $wallet; ?><span></p>
                    </div>
                    <div class="yellow" style="background-color: #FFC30B;padding:20px;border-radius: 10px;text-align:center;margin:10px 10px 10px 10px;">    
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 pt-3">
                                    <div class="amount">
                                    <button class="btn" style="background-color: background-color: transparent;font-size:20px;" onclick="redirectToCashIn()"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg><br>Cash In</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 pt-3">
                                    <button class="btn " style="background-color: transparent;font-size:20px;" onclick="toggleTransactions()"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z"/></svg><br>Transaction</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="transactions" style="display: none;">
                        <p style="font-size:25px;padding-left:25px;font-weight:600;">Transaction History</p>
                        <hr>
                        <table id="example" class="table bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#FFC30B;text-align:center">Transaction Number</th>
                              <th style="background-color:#FFC30B;text-align:center;">Status</th>
                              <th style="background-color:#FFC30B;text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                           <?php displayTransactions(); ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
                <h3 class="modal-title fs-5" id="secondModalLabel" style="font-weight:900;">Delete Transaction</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>    
        <div class="modal-body">
                <center>
                <p style="padding:10px">Are you sure you want to delete this Transaction?</p>
                </center>
            </div>
            <div class="modal-footer text-center border-0">
                <button type="button" class="btn btn-danger" onclick="confirmDelete()" style="margin: 0 auto;">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel" >Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Message content will be dynamically populated here -->
            </div>
        </div>
    </div>
</div>
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
      <!-- Data Table JS -->
      <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
      <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
      <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
      <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

      <!-- Script JS -->
      <script>
         $(document).ready(function() {
             $('#example').DataTable({
                 //disable sorting on last column
                 "columnDefs": [
                     { "orderable": false, "targets": 2 }
                 ],
                 language: {
                     //customize pagination prev and next buttons: use arrows instead of words
                     'paginate': {
                         'previous': '<span class="fa fa-chevron-left"></span>',
                         'next': '<span class="fa fa-chevron-right"></span>'
                     },
                     //customize number of elements to be displayed
                     "lengthMenu": 'Display <select class="form-control input-sm">' +
                         '<option value="10">10</option>' +
                         '<option value="20">20</option>' +
                         '<option value="30">30</option>' +
                         '<option value="40">40</option>' +
                         '<option value="50">50</option>' +
                         '<option value="-1">All</option>' +
                         '</select> results'
                 }
             })
         });

      </script>
      <script>
    function toggleTransactions() {
        var transactions = document.querySelector('.transactions');
        if (transactions.style.display === 'none' || transactions.style.display === '') {
            transactions.style.display = 'block';
        } else {
            transactions.style.display = 'none';
        }
    }
</script>
<script>
    function deleteTransaction(transactionId) {
        // Set the transaction ID in the modal for confirmation
        $('#deleteModal').data('transactionId', transactionId);

        // Show the delete confirmation modal
        $('#deleteModal').modal('show');
    }

    function confirmDelete() {
        // Get the transaction ID from the modal
        var transactionId = $('#deleteModal').data('transactionId');

        // Perform AJAX request to delete the transaction
        $.ajax({
            type: 'POST',
            url: 'delete_transaction.php', // Replace with the actual file handling the deletion
            data: { transactionId: transactionId },
            success: function(response) {
                // Reload the page or update the transaction table
                location.reload();
            },
            error: function(error) {
                // Handle error
                console.log('Error deleting transaction: ', error);
            }
        });

        // Close the modal after deletion
        $('#deleteModal').modal('hide');
    }
</script>


    <script>
    function redirectToCashIn() {
        window.location.href = 'cashin.php';
    }
</script>
<script>
    $(document).ready(function() {
        // DataTable initialization code (already present in your code)

        // Add click event to specific columns (second and third columns)
        $('#example tbody').on('click', 'td:nth-child(1), td:nth-child(2)', function () {
            // Get the corresponding row and transactionId
            var transactionId = $(this).closest('tr').data('id');

            // Fetch date and amount using AJAX
            $.ajax({
                url: 'get_transaction_details.php', // Replace with the actual PHP file to fetch details
                method: 'POST',
                data: { transactionId: transactionId },
                success: function(response) {
                    // Display the date and amount in the modal
                    $('#messageModal .modal-body').html(response);
                    $('#messageModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                    alert('Error: ' + error.statusText);
                }
            });
        });
    });
</script>

</body>
</html>


