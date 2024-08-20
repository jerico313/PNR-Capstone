<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display passenger data
function displayPassengerData() {
    include("inc/config.php");

    $sql = "SELECT * FROM accounts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            // Add other columns as needed
            echo "<td><img src='../assets/uploads/" . $row['profile_picture'] . "' alt='Passenger Image' style='width:50px;height:50px;'></td>"; // Example for image column
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editPassenger(" . $row['id'] . ")'>Edit</button>";
            echo "<button class='btn btn-danger btn-sm' onclick='deletePassenger(" . $row['id'] . ")'>Delete</button>";
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
                    <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Registered Passenger</strong></p>
                </div>
                <div class="custom-box blue-box">
         <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
                <th style="background-color:#174793;color:#FFF;">No.</th>
                <th style="background-color:#174793;color:#FFF;">First Name</th>
                <th style="background-color:#174793;color:#FFF;">Last Name</th>
                <th style="background-color:#174793;color:#FFF;">Email</th>
                <th style="background-color:#174793;color:#FFF;">Image</th>
                <th style="background-color:#174793;color:#FFF;">Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayPassengerData(); ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Passenger</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="edit_passenger.php" method="post">
                    <!-- Add your form fields for editing here -->
                    <input type="hidden" id="editPassengerId" name="editPassengerId" value="">
                    <div class="mb-3">
                        <label for="editFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="editFirstName" name="editFirstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="editLastName" name="editLastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="editEmail" required>
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
                <p style="padding:10px">Are you sure you want to delete this passenger?</p>
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
      <script src="./js/script.js"></script>
<script>
    function editPassenger(passengerId) {
    // Fetch the current data of the selected passenger
    var passengerFirstName = $('#dynamicTableBody').find('tr[data-id="' + passengerId + '"] td:nth-child(2)').text();
    var passengerLastName = $('#dynamicTableBody').find('tr[data-id="' + passengerId + '"] td:nth-child(3)').text();
    var passengerEmail = $('#dynamicTableBody').find('tr[data-id="' + passengerId + '"] td:nth-child(4)').text();

    // Set values in the edit modal
    $('#editPassengerId').val(passengerId);
    $('#editFirstName').val(passengerFirstName);
    $('#editLastName').val(passengerLastName);
    $('#editEmail').val(passengerEmail);

    // Open the edit modal
    $('#editModal').modal('show');
}
</script>
<script>
    // JavaScript functions for button

    function deletePassenger(passengerId) {
        // Set the passenger ID to be deleted
        $('#deleteModal').data('passengerId', passengerId);
        // Open the delete confirmation modal
        $('#deleteModal').modal('show');
    }

    function confirmDelete() {
        // Get the passenger ID to be deleted
        var passengerId = $('#deleteModal').data('passengerId');

        // Add logic for deleting a passenger
        $.ajax({
            url: 'delete_passenger.php',
            method: 'POST',
            data: { passengerId: passengerId },
            success: function(response) {
                // Log the response from the server
                console.log(response);

                // If deletion is successful, reload the page
                if (response === "Passenger deleted successfully") {
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
