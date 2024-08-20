<?php
require_once('header.php');
require_once('sidenav.php');

// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display fare data
function displayFareData() {
    include("inc/config.php");

    $sql = "SELECT * FROM faretable";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['fare_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['route'] . "</td>";
            echo "<td>" . $row['fare'] . "</td>";
            echo "<td>" . $row['Direction'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editFare(" . $row['fare_id'] . ")'>Edit</button> ";
            echo '<button class="btn btn-danger btn-sm" onclick="deleteFare(' . $row['fare_id'] . ')">Delete</button>';
            echo "</td>";            
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

// Fetch station options from the 'stations' table
function getStationOptions() {
    include("inc/config.php");

    $stationOptions = array();

    $sql = "SELECT * FROM stations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $stationOptions[$row['station_name']] = $row['station_value'];
        }
    }

    $conn->close();

    return $stationOptions;
}

$stationOptions = getStationOptions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $origin = $_POST['origin'][0];
    $destination = $_POST['destination'][0];
    $route = $origin . ' - ' . $destination; // Concatenate origin and destination to form the route
    $fare = $_POST['fare'];
    $direction = $_POST['direction'];

    // Validate the data
    // Remove password validation as it's removed from the form

    // Proceed with database insertion
    include("inc/config.php");

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO faretable (route, fare, Direction) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $route, $fare, $direction);
    
    // Perform database insertion
    if ($stmt->execute()) {
        // Record added successfully
        echo "<script>alert('Record added successfully'); window.location = 'fare.php';</script>";
        echo "<script>displayFareData();</script>"; // Call the function to display data
    } else {
        // Error occurred, show JavaScript alert with the error message
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }

    $stmt->close();
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
                    <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Fare</strong></p>
                    <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Fare</button>
                </div>
                <div class="custom-box blue-box">
         <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
                <th style="background-color:#174793;color:#FFF;">No.</th>
                <th style="background-color:#174793;color:#FFF;">Route</th>
                <th style="background-color:#174793;color:#FFF;">Fare</th>
                <th style="background-color:#174793;color:#FFF;">Direction</th>
                <th style="background-color:#174793;color:#FFF;">Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayFareData(); ?>
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
                <h5 class="modal-title" id="addFare" style="font-weight:900;color:#FFF">Fare</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="origin" class="form-label">Origin</label>
                        <select class="form-select" id="origin" name="origin[]" required>
                            <option value="" disabled selected>Select Station</option>
                            <?php
                            foreach ($stationOptions as $stationName => $stationValue) {
                                echo '<option value="' . $stationValue . '">' . $stationName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <select class="form-select" id="destination" name="destination[]" required>
                            <option value="" disabled selected>Select Station</option>
                            <?php
                            foreach ($stationOptions as $stationName => $stationValue) {
                                echo '<option value="' . $stationValue . '">' . $stationName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fare" class="form-label">Fare</label>
                        <input type="text" class="form-control" id="fare" name="fare" required>
                    </div>
                    <div class="mb-3">
                        <label for="direction" class="form-label">Direction</label>
                        <select class="form-select" id="direction" name="direction" required>
                            <option value="" disabled selected>Select Direction</option>
                            <option value="Southbound">Southbound</option>
                            <option value="Northbound">Northbound</option>
                        </select>
                    </div>
                    <div class="modal-footer border-0" style="float:right;">                    
                    <button type="submit" class="btn btn-success" id="signup" name="signup">Add fare</button>
                    </div >
                </div>
        </div>
    </div>
</div>
</form>

<!-- Edit Fare Modal -->
<!-- Edit Fare Modal -->
<div class="modal fade" id="editFareModal" tabindex="-1" aria-labelledby="editFareModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFareModalLabel" style="font-weight:900;color:#FFF">Edit Fare</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editFareForm" action="edit_fare.php" method="post">
                    <!-- Add your form fields for editing fares here -->
                    <input type="hidden" id="editFareId" name="editFareId" value="">
                    <div class="mb-3">
                        <label for="editOrigin" class="form-label">Origin</label>
                        <select class="form-select" id="editOrigin" name="editOrigin" required>
                            <option value="" disabled selected>Select Station</option>
                            <?php
                            foreach ($stationOptions as $stationName => $stationValue) {
                                echo '<option value="' . $stationValue . '">' . $stationName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editDestination" class="form-label">Destination</label>
                        <select class="form-select" id="editDestination" name="editDestination" required>
                            <option value="" disabled selected>Select Station</option>
                            <?php
                            foreach ($stationOptions as $stationName => $stationValue) {
                                echo '<option value="' . $stationValue . '">' . $stationName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editFare" class="form-label">Fare</label>
                        <input type="text" class="form-control" id="editFare" name="editFare" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFareDirection" class="form-label">Direction</label>
                        <select class="form-select" id="editFareDirection" name="editFareDirection" required>
                            <option value="Southbound">Southbound</option>
                            <option value="Northbound">Northbound</option>
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
                <p style="padding:10px">Are you sure you want to delete this fare?</p>
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
function editFare(fareId) {
    // Fetch the current data of the selected fare
    var fareRoute = $('#dynamicTableBody').find('tr[data-id="' + fareId + '"] td:nth-child(2)').text();
    var fareAmount = $('#dynamicTableBody').find('tr[data-id="' + fareId + '"] td:nth-child(3)').text();
    var fareDirection = $('#dynamicTableBody').find('tr[data-id="' + fareId + '"] td:nth-child(4)').text();

    // Split the route to get origin and destination
    var originDestination = fareRoute.split(' - ');
    var origin = originDestination[0];
    var destination = originDestination[1];

    // Set values in the edit modal
    $('#editFareId').val(fareId);
    $('#editOrigin').val(origin);
    $('#editDestination').val(destination);
    $('#editFare').val(fareAmount);
    $('#editFareDirection').val(fareDirection);

    // Open the edit modal
    $('#editFareModal').modal('show');
}


</script>

      <script>
function deleteFare(fareId) {
    // Set the fare ID to be deleted
    $('#deleteModal').data('fareId', fareId);
    // Open the delete confirmation modal
    $('#deleteModal').modal('show');
}

function confirmDelete() {
    // Get the fare ID to be deleted
    var fareId = $('#deleteModal').data('fareId');

    // Add logic for deleting a fare
    $.ajax({
        url: 'delete_fare.php',
        method: 'POST',
        data: { fareId: fareId },
        success: function(response) {
            // Log the response from the server
            console.log(response);

            // If deletion is successful, remove the row from the table
            if (response === "Fare deleted successfully") {
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

            // Close the delete confirmation modal
        }
    });
}

    </script>
   </body>
</html>