<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display station data
function displayTickets() {
   include("inc/config.php");

    $sql = "SELECT * FROM tickets";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['ticket_id'] . "'>";
            echo "<td>" . $row['ticket_id']  . "</td>";
            echo "<td>" . $row['route'] . "</td>";
            echo "<td>" . $row['date']  . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteStation(" . $row['ticket_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Responsive & sortable Bootstrap data table Example </title>
      <!--Style CSS 
      <link rel="stylesheet" href="./css/style.css">
        Demo CSS (No need to include it into your project) 
      <link rel="stylesheet" href="./css/demo.css">
      Bootstrap 5 CSS -->
      <!-- Data Table CSS -->
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
   </head>
   <body>
      <!--$%adsense%$-->
      <!-- Start DEMO HTML (Use the following code into your project)-->
      <div class="content">
         <div class="container pt-5">
            <div class="row">
               <div class="col-md-12 pt-5">
                  <div class="custom-box yellow-box">
                     <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Tickets</strong></p>
                  </div>
                  <div class="custom-box blue-box">
                     <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#174793;color:#FFF;">Ticket No.</th>
                              <th style="background-color:#174793;color:#FFF;">Route</th>
                              <th style="background-color:#174793;color:#FFF;">Date</th>
                              <th style="background-color:#174793;color:#FFF;">Status</th>
                              <th style="background-color:#174793;color:#FFF;">Action</th>
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
      

      <!-- Modal for Delete Confirmation -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);border-radius: 12px;border: 1px solid rgba(209, 213, 219, 0.3);">
               <div class="modal-body">
                  <center>
                     <p style="padding:10px">Are you sure you want to delete this ticket?</p>
                  </center>
               </div>
               <div class="modal-footer  text-center">
                  <button type="button" class="btn" onclick="confirmDelete()" style="background-color:transparent;margin: 0 auto;color: red;">Delete</button>
               </div>
            </div>
         </div>
      </div>
      <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
      <!-- Data Table JS -->
      <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
      <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
      <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
      <!-- Script JS -->
      <script>
         $(document).ready(function() {
             $('#example').DataTable({
                 //disable sorting on last column
                 "columnDefs": [
                     { "orderable": false, "targets": 4 }
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
         // JavaScript functions for button
         function deleteStation(ticketId) {
             // Set the station ID to be deleted
             $('#deleteModal').data('ticketId', ticketId);
             // Open the delete confirmation modal
             $('#deleteModal').modal('show');
         }

         function confirmDelete() {
             // Get the station ID to be deleted
             var ticketId = $('#deleteModal').data('ticketId');

             // Add logic for deleting a station
             $.ajax({
                 url: 'delete_ticket.php',
                 method: 'POST',
                 data: { ticketId: ticketId },
                 success: function(response) {
                     // Log the response from the server
                     console.log(response);

                     // If deletion is successful, reload the page
                     if (response === "Station deleted successfully") {
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

                     // Show an alert for the error
                     alert('Error: ' + error.statusText);

                 }
             });
         }
      </script>
   </body>
</html>
