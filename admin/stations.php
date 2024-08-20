<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display station data
function displayStationData() {
   include("inc/config.php");

    $sql = "SELECT * FROM stations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['station_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['station_name'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editStation(" . $row['station_id'] . ")'>Edit</button> ";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteStation(" . $row['station_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $station_name = $_POST['station_name'];

    // Check if the station name already exists in the database
    include("inc/config.php");

    $stationCheck = "SELECT * FROM stations WHERE station_name = '$station_name'";
    $result = $conn->query($stationCheck);

    if ($result->num_rows > 0) {
        // Station name already exists, show an error message
        echo "<script>alert('Station name already exists. Please use a different name.');</script>";
    } else {
        // Station name is unique, proceed with database insertion
        $sql = "INSERT INTO stations (station_name, station_value) VALUES ('$station_name', '$station_name')";
        
        // Perform database insertion
        if ($conn->query($sql) === TRUE) {
            // Record added successfully
            echo "<script>alert('Record added successfully'); window.location = 'stations.php';</script>";
            echo "<script>displayStationData();</script>"; // Call the function to display data
        } else {
            // Error occurred, show JavaScript alert with the error message
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
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
                     <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Stations</strong></p>
                     <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Station</button>
                  </div>
                  <div class="custom-box blue-box">
                     <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#174793;color:#FFF;">No.</th>
                              <th style="background-color:#174793;color:#FFF;">Station</th>
                              <th style="background-color:#174793;color:#FFF;">Action</th>
                           </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                           <?php displayStationData(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addStation" style="font-weight:900;color:#FFF">Station</h5>
                     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
                  </div>
                  <div class="modal-body">
                     <div class="mb-3">
                        <label for="station_name" class="form-label">Station</label>
                        <input type="text" class="form-control" id="station_name" name="station_name" required>
                     </div>
                     <div class="modal-footer border-0" style="float:right;">
                        <button type="submit" class="btn btn-success" id="addStationBtn" name="addStationBtn">Add Station</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Station</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="editForm" action="edit_station.php" method="post">
                     <!-- Add your form fields for editing here -->
                     <input type="hidden" id="editStationId" name="editStationId" value="">
                     <div class="mb-3">
                        <label for="editStationName" class="form-label">Station</label>
                        <input type="text" class="form-control" id="editStationName" name="editStationName" required>
                     </div>
                     <div class="modal-footer border-0" style="float:right;">
                        <button type="submit" class="btn btn-success">Save changes</button>
                     </div>
                  </form>
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
                     <p style="padding:10px">Are you sure you want to delete this station?</p>
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
         function editStation(stationId) {
             // Fetch the current data of the selected station
             var stationName = $('#dynamicTableBody').find('tr[data-id="' + stationId + '"] td:nth-child(2)').text();

             // Set values in the edit modal
             $('#editStationId').val(stationId);
             $('#editStationName').val(stationName);

             // Open the edit modal
             $('#editModal').modal('show');
         }
      </script>
      <script>
         // JavaScript functions for button
         function deleteStation(stationId) {
             // Set the station ID to be deleted
             $('#deleteModal').data('stationId', stationId);
             // Open the delete confirmation modal
             $('#deleteModal').modal('show');
         }

         function confirmDelete() {
             // Get the station ID to be deleted
             var stationId = $('#deleteModal').data('stationId');

             // Add logic for deleting a station
             $.ajax({
                 url: 'delete_station.php',
                 method: 'POST',
                 data: { stationId: stationId },
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
