<?php 
session_start();

header('Content-Type: text/html; charset=utf-8'); // Set the content type to UTF-8

// Check if the user is logged in (check for user_id in the session)
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

// Include the database connection code
include("admin/inc/config.php"); 
include("phpqrcode/qrlib.php");

// Check if the user is logged in and retrieve user data, including the profile picture
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        $points = $user_data['points'];
        $wallet = $user_data['wallet'];
    } else {
        // Handle the case where user data is not found
        $profile_picture = 'default_profile.jpg'; // Set a default profile picture
    }
}

function displayTickets() {
    include("admin/inc/config.php"); 

    $conn->set_charset("utf8"); // Set the charset to UTF-8

    // Retrieve the current user's id
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM tickets WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['ticket_id'] . "'>";
            echo "<td style='text-align:center;'>" . $row['ticket_id']. "</td>";
            echo "<td>" . $row['route'] . "</td>";
            echo "<td style='text-align:center;'>" . $row['date'] . "</td>";
            echo "<td style='text-align:center;'>" . $row['fare'] . "</td>";
            echo "<td style='text-align:center;'>" . $row['status'] . "</td>";
            echo "<td>";
            echo "<center><button class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#viewTicketModal' onclick='viewticket(\"" . $row['ticket_id'] . "\", \"" . $row['route'] . "\", \"" . $row['date'] . "\", \"" . $row['fare'] . "\", \"" . $row['status'] . "\")'>View Ticket</button> ";
            echo '<button class="btn btn-danger btn-sm" onclick="deleteTicket(' . $row['ticket_id'] . ')">Delete</button>';
            echo "</td>";
            echo "</tr>";
            $count++;
            $ticketContent = "Ticket ID: " . $row['ticket_id'] . "\nRoute: " . $row['route'] . "\nDate: " . $row['date'] . "\nFare: " . $row['fare'] . "\nStatus: " . $row['status'];
            $utf8TicketContent = utf8_encode($ticketContent); // Ensure UTF-8 encoding
            QRcode::png($utf8TicketContent, "qrcodes/ticket_" . $row['ticket_id'] . ".png");
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

    <title>Responsive Side Navbar</title>
    <link rel="stylesheet" type="text/css" href="style-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <style>
    .sub{
        z-index: 1;
        position:fixed;
        background-color:#FFF;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0) 0px 2px 4px -1px;
        padding-bottom:13px;
      }
      
        .table {
    width: 94% !important;
}

#fare{
    font-family:'Libre Baskerville',serif;
    font-size:23px;"
}

#zero{
    font-family:'Libre Baskerville',serif;
    font-size:23px;"
}

.bord {
    border: 1px solid white !important;
    background: lightgray;
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


#ticketQRCode {
    display: flex;
    padding-bottom:5px;
    width: 80px;
    height: 80px;
}

.ticketlabel{
    padding-left:1.5em;
}

.modal-content{
    width:94%;
    border-radius:0;
    border:none;
    background: rgba(255, 255, 255, 0);
    backdrop-filter: blur(0px);
    -webkit-backdrop-filter: blur(0px);
}

.modal-body{
    background-image: url(images/pattern.png);
    background-size: cover;
    background-repeat: no-repeat;"
}
@media (max-width: 768px) {
        .time-container {
          display: none;
        }

        .modal-content{
    width:100%;
    }

    .modal-body{
    background-image: url(images/pattern.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-size: 410px 300px;
}

        .content{
            margin-top:60px;
        }
        .sub {
          display: none;
        }

        #fare, #zero{
    font-family:'Libre Baskerville',serif;
    font-size:19px;"
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
      }
      @media only screen and (min-width: 768px) {
    .table {
      max-width: 100% !important;
    }

}


@media only screen and (min-width: 768px) {
    .table {
      max-width: 100% !important;
    }
}

@media only screen and (max-width: 767px) {
    /* Force table to not be like tables anymore */
    table,
  thead,
  tbody,
  th,
  td,
  tr {
      display: block;
    }
  
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr,
  tfoot tr {
      /* position: absolute;
     top: -9999px;
      left: -9999px;*/
    }
  
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50% !important;
    }
  
    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }
  
    .table td:nth-child(1) {
      background: #ccc;
      height: 100%;
      top: 0;
      left: 0;
      font-weight: bold;
    }

    .table td:nth-child(2) {
      text-align:center;
    }

    .table td:nth-child(6) {
      text-align:center;
    }
  
    /*
    Label the data*/
  
    td:nth-of-type(1):before {
      content: "Ticket Number";
    }
  
    td:nth-of-type(2):before {
      content: "Route";
    }
  
    td:nth-of-type(3):before {
      content: "Date";
    }
  
    td:nth-of-type(4):before {
      content: "Fare";
    }
  
    td:nth-of-type(5):before {
      content: "Status";
    }
  
    td:nth-of-type(6):before {
        content: "Action";
    } 

    .dataTables_length {
      display: none;
    }
  }
/* Add any other styling you need to match the ticket image */

    </style>
</head>
<body>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-box yellow-box">
                    <p><strong>My Tickets</strong></p>
                </div>
                <div class="custom-box blue-box">
                <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#FFC30B;text-align:center">Ticket Number</th>
                              <th style="background-color:#FFC30B;text-align:center">Route</th>
                              <th style="background-color:#FFC30B;text-align:center">Date</th>
                              <th style="background-color:#FFC30B;text-align:center">Fare</th>
                              <th style="background-color:#FFC30B;text-align:center">Status</th>
                              <th style="background-color:#FFC30B;text-align:center">Ticket</th>
                            </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                           <?php displayTickets(); ?>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content" >
            <div class="modal-body" >
                <p style="padding-top:10px;font-size:16px;text-align:center;font-family:'Libre Baskerville',serif;">Philippine National Railways<br>Online Ticket</p>
                <div class="row ticketlabel">
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:13px;">Train No.: <span id="trainNo" style="text-decoration: underline;font-family:'Libre Baskerville',serif;font-size:13px;"></span></p>
                </div>
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:13px;">From: <span id="fromStation" style="text-decoration: underline;font-family:'Libre Baskerville',serif;font-size:13px;"></span></p>
                </div>
                </div>
                <div class="row ticketlabel">
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:13px;">Date: <span id="ticketDate" style="text-decoration: underline;font-family:'Libre Baskerville',serif;font-size:13px;"></span></p>
                </div>
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:13px;">To: <span id="toStation" style="text-decoration: underline;font-family:'Libre Baskerville',serif;font-size:13px;"></span></p>
                </div>
                </div>
                
                <div class="row ticketlabel">
                <div class="col">
                <div id="ticketQRCode"></div>
                </div>
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:15px;margin-left:10px;margin-top:15px">PASSENGER COPY</p>
                </div>
                <div class="col">
                <p style="font-family:'Libre Baskerville',serif;font-size:13px;">No: <span id="ticketNo" style="text-decoration: underline;font-family:'Libre Baskerville',serif;font-size:13px;"></span></p>
                <p style="font-family:'Libre Baskerville',serif;font-size:25px;text-align:center">₱ <span id="fare" ></span><span id="zero">.00</span></p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
                <h3 class="modal-title fs-5" id="secondModalLabel" style="font-weight:900;">Delete Ticket</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>    
        <div class="modal-body">
                <center>
                <p style="padding:10px">Are you sure you want to delete this Ticket?</p>
                </center>
            </div>
            <div class="modal-footer text-center border-0">
                <button type="button" class="btn btn-danger" onclick="confirmDelete()" style="margin: 0 auto;">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
function deleteTicket(ticketId) {
    // Set the fare ID to be deleted
    $('#deleteModal').data('ticketId', ticketId);
    // Open the delete confirmation modal
    $('#deleteModal').modal('show');
}

function confirmDelete() {
    // Get the fare ID to be deleted
    var ticketId = $('#deleteModal').data('ticketId');

    // Add logic for deleting a fare
    $.ajax({
        url: 'delete_ticket.php',
        method: 'POST',
        data: { ticketId: ticketId },
        success: function(response) {
            // Log the response from the server
            console.log(response);

            // If deletion is successful, remove the row from the table
            if (response === "Ticket deleted successfully") {
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
                     { "orderable": false, "targets": 5 }
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
    function viewticket(ticketId, route, date, fare, status) {
    // Split the route into From and To
    var routeParts = route.split('-');
    var fromStation = routeParts[0].trim();
    var toStation = routeParts[1].trim();

    // Set the content of the modal dynamically
    $('#ticketNo').text(ticketId);
    $('#fromStation').text(fromStation);
    $('#ticketDate').text(date);
    $('#toStation').text(toStation);
    $('#fare').text(fare);

    // Clear previous content and generate new QR code
    $('#ticketQRCode').empty();
    new QRCode(document.getElementById('ticketQRCode'), {
        text: ticketId,
        width: 128,
        height: 128
    });

    // Show the modal
    $('#viewTicketModal').modal('show');
}

</script>

</body>
</html>

