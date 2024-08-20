<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display train data
function displayCommentsData() {
   include("inc/config.php");

   $sql = "SELECT * FROM comments_complaints"; // Change table name from inquiry to inbox
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       $count = 1;
       while ($row = $result->fetch_assoc()) {
           echo "<tr data-id='" . $row['complaints_id'] . "' class='message-row'>";
           echo "<td class='message-cell'>" . $count . "</td>";
           echo "<td class='message-cell'>" . $row['name'] . "</td>";
           echo "<td class='message-cell'>" . $row['subject'] . "</td>";
           echo "<td class='message-cell'>" . $row['email'] . "</td>";
           echo "<td>";
           echo "<button class='btn btn-success btn-sm' onclick='ReplyMessage(" . $row['complaints_id'] . ")'>Reply</button> ";
           echo "<button class='btn btn-danger btn-sm' onclick='deleteMessage(" . $row['complaints_id'] . ")'>Delete</button>";
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
      <meta name="author" content="CodeHim">
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
      <style>
        .message-cell {
            cursor: pointer;
        }
    </style>
   </head>
   <body>
      <!--$%adsense%$-->
      <!-- Start DEMO HTML (Use the following code into your project)-->
      <div class="content">
         <div class="container pt-5">
            <div class="row">
               <div class="col-md-12 pt-5">
                  <div class="custom-box yellow-box">
                     <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Comments and Complaints</strong></p>
                  </div>
                  <div class="custom-box blue-box">
                     <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#174793;color:#FFF;">No.</th>
                              <th style="background-color:#174793;color:#FFF;">Name</th>
                              <th style="background-color:#174793;color:#FFF;">Subject</th>
                              <th style="background-color:#174793;color:#FFF;">Email</th>
                              <th style="background-color:#174793;color:#FFF;">Action</th>
                           </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                        <?php displayCommentsData(); ?>
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
                     <p style="padding:10px">Are you sure you want to delete this Inquiry?</p>
                  </center>
               </div>
               <div class="modal-footer  text-center">
                  <button type="button" class="btn" onclick="confirmDelete()" style="background-color:transparent;margin: 0 auto;color: red;">Delete</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel" style="color:#fff;">Message Content</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
      <!-- Add this script section to your HTML file -->
      <script>
$(document).ready(function() {
   // DataTable initialization code (already present in your code)

   // Add click event to specific columns (1, 2, 3, and 4)
   $('#example tbody').on('click', 'td:nth-child(1), td:nth-child(2), td:nth-child(3), td:nth-child(4)', function () {
      // Access the row from the clicked cell
      var row = $(this).closest('tr');
      var complaintsId = row.data('id');
      
      // Fetch subject, message, and date using AJAX
      $.ajax({
         url: 'get_comments_complaints_details.php', // Replace with the actual PHP file to fetch details
         method: 'POST',
         data: { complaintsId: complaintsId },
         success: function(response) {
            // Display the subject, message, and date in the modal
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
<script>
   function ReplyMessage(complaintsId) {
    // Fetch the email using AJAX
    $.ajax({
        url: 'get_complaints_email.php', // Replace with the actual PHP file to fetch email
        method: 'POST',
        data: { complaintsId: complaintsId },
        success: function(response) {
            // Open Gmail with the email of the person who sent the selected inquiry
            window.location.href = 'mailto:' + response;
        },
        error: function(error) {
            console.log(error);
            alert('Error: ' + error.statusText);
        }
    });
}
</script>
      <script>
         function deleteMessage(complaintsId) {
             // Set the train ID to be deleted
             $('#deleteModal').data('complaintsId', complaintsId);
             // Open the delete confirmation modal
             $('#deleteModal').modal('show');
         }

         function confirmDelete() {
             // Get the train ID to be deleted
             var complaintsId = $('#deleteModal').data('complaintsId');

             // Add logic for deleting a train
             $.ajax({
                 url: 'delete_comments_complaints.php',
                 method: 'POST',
                 data: { complaintsId: complaintsId },
                 success: function(response) {
                     // Log the response from the server
                     console.log(response);

                     // If deletion is successful, reload the page
                     if (response === "Inquiry deleted successfully") {
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
