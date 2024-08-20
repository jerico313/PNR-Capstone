<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display train data
function displayTrainData() {
   include("inc/config.php");

    $sql = "SELECT * FROM trains"; // Change table name from stations to trains
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['train_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['train_no'] . "</td>";
            echo "<td>" . $row['current_employee_id'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editTrain(" . $row['train_id'] . ")'>Edit</button> ";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteTrain(" . $row['train_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

function fetchEmployeeNames() {
   include("inc/config.php");

   $employeeSql = "SELECT employee_id, emp_firstname, emp_lastname FROM employees WHERE role = 'Train Operator'";
   $employeeResult = $conn->query($employeeSql);

   if ($employeeResult->num_rows > 0) {
       while ($employeeRow = $employeeResult->fetch_assoc()) {
           $fullName = $employeeRow['emp_firstname'] . ' ' . $employeeRow['emp_lastname'];
           echo "<option value='" . $employeeRow['employee_id'] . "'>" . $fullName . "</option>";
       }
   } else {
       echo "<option value=''>No Train Operators found</option>";
   }

   $conn->close();
}

// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Retrieve form data
   $train_no = $_POST['train_no']; // Change variable name from station_name to train_no
   $employee_id = $_POST['employeename']; // Added to capture the selected employee_id

   // Check if the train name already exists in the database
   include("inc/config.php");

   $trainCheck = "SELECT * FROM trains WHERE train_no = '$train_no'";
   $result = $conn->query($trainCheck);

   if ($result->num_rows > 0) {
       // Train name already exists, show an error message
       echo "<script>alert('Train name already exists. Please use a different name.');</script>";
   } else {
       // Train name is unique, proceed with database insertion
       $sql = "INSERT INTO trains (train_no, train_value, current_employee_id) VALUES ('$train_no', '$train_no', '$employee_id')";
       
       // Perform database insertion
       if ($conn->query($sql) === TRUE) {
           // Record added successfully
           echo "<script>alert('Record added successfully'); window.location = 'trains.php';</script>";
           echo "<script>displayTrainData();</script>"; // Call the function to display data
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
      <meta name="author" content="CodeHim">
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
                     <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Trains</strong></p>
                     <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Train</button>
                  </div>
                  <div class="custom-box blue-box">
                     <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#174793;color:#FFF;">No.</th>
                              <th style="background-color:#174793;color:#FFF;">Train No.</th>
                              <th style="background-color:#174793;color:#FFF;">Employee Id</th>
                              <th style="background-color:#174793;color:#FFF;">Action</th>
                           </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                           <?php displayTrainData(); ?>
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
                     <h5 class="modal-title" id="addStation" style="font-weight:900;color:#FFF">Train</h5>
                     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
                  </div>
                  <div class="modal-body">
                     <div class="mb-3">
                        <label for="train_no" class="form-label">Train</label>
                        <input type="text" class="form-control" id="train_no" name="train_no" required> <!-- Change id and name from station_name to train_no -->
                     </div>
                     <div class="mb-3">
                            <label for="employeename" class="form-label">Employee Name</label>
                            <select class="form-select" id="employeename" name="employeename" required>
                                <option value="" disabled selected>Select Employee</option>
                                <?php fetchEmployeeNames(); ?>
                            </select>
                        </div>
                     <div class="modal-footer border-0" style="float:right;">
                        <button type="submit" class="btn btn-success" id="addStationBtn" name="addStationBtn">Add Train</button>
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
                  <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Train</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="editForm" action="edit_train.php" method="post">
                     <!-- Add your form fields for editing here -->
                     <input type="hidden" id="editTrainId" name="editTrainId" value="">
                     <div class="mb-3">
                        <label for="editTrainName" class="form-label">Train</label>
                        <input type="text" class="form-control" id="editTrainName" name="editTrainName" required>
                     </div>
                     <div class="mb-3">
                            <label for="employeename" class="form-label">Employee Name</label>
                            <select class="form-select" id="employeename" name="employeename" required>
                                <option value="" disabled selected>Select Employee</option>
                                <?php fetchEmployeeNames(); ?>
                            </select>
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
                     <p style="padding:10px">Are you sure you want to delete this train?</p>
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
                     { "orderable": false, "targets": 3 }
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
         function editTrain(trainId) {
             // Fetch the current data of the selected train
             var trainName = $('#dynamicTableBody').find('tr[data-id="' + trainId + '"] td:nth-child(2)').text();

             // Set values in the edit modal
             $('#editTrainId').val(trainId);
             $('#editTrainName').val(trainName);

             // Open the edit modal
             $('#editModal').modal('show');
         }
      </script>
      <script>
         // JavaScript functions for button
         function deleteTrain(trainId) {
             // Set the train ID to be deleted
             $('#deleteModal').data('trainId', trainId);
             // Open the delete confirmation modal
             $('#deleteModal').modal('show');
         }

         function confirmDelete() {
             // Get the train ID to be deleted
             var trainId = $('#deleteModal').data('trainId');

             // Add logic for deleting a train
             $.ajax({
                 url: 'delete_train.php',
                 method: 'POST',
                 data: { trainId: trainId },
                 success: function(response) {
                     // Log the response from the server
                     console.log(response);

                     // If deletion is successful, reload the page
                     if (response === "Train deleted successfully") {
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
