<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display employee data
function displayEmployeeData() {
    include("inc/config.php");

    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['employee_id'] . "'>";
            echo "<td>" . $row['employee_id'] . "</td>";
            echo "<td>" . $row['emp_firstname'] . "</td>";
            echo "<td>" . $row['emp_lastname'] . "</td>";
            echo "<td>" . $row['emp_email'] . "</td>";
            echo "<td style='font-size:5px;'>" . $row['password'] . "</td>";
            // Add other columns as needed
            echo "<td><img src='images/" . $row['profile_picture'] . "' alt='Employee Image' style='width:50px;height:50px;'></td>"; // Example for image column
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editEmployee(" . $row['employee_id'] . ")'>Edit</button>";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteEmployee(" . $row['employee_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Validate the data
if ($password != $confirmpassword) {
    // Password and confirm password do not match, show an error message
    echo "<script>alert('Password and confirm password do not match');</script>";
} else {
    // Passwords match, proceed with email validation
    // Check if the email already exists in the database
    include("inc/config.php");

    $emailCheck = "SELECT * FROM employees WHERE emp_email = '$email'";
    $result = $conn->query($emailCheck);

    if ($result->num_rows > 0) {
        // Email already exists, show an error message
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {
        // Email is unique, proceed with database insertion
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO employees (emp_firstname, emp_lastname, emp_email, role, password) VALUES ('$firstname', '$lastname', '$email', '$role', '$hashedPassword')";
        
        // Perform database insertion
        if ($conn->query($sql) === TRUE) {
            // Record added successfully
            echo "<script>alert('Record added successfully'); window.location = 'reg_employee.php';</script>";
            echo "<script>displayEmployeeData();</script>"; // Call the function to display data
        } else {
            // Error occurred, show JavaScript alert with the error message
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }
    }
    $conn->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> Responsive & sortable Bootstrap data table Example </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<div class="content">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 pt-5">
                <div class="custom-box yellow-box">
                    <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Registered Employee</strong></p>
                    <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Employee</button>
                </div>
                <div class="custom-box blue-box">
         <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
                <th style="background-color:#174793;color:#FFF;">No.</th>
                <th style="background-color:#174793;color:#FFF;">First Name</th>
                <th style="background-color:#174793;color:#FFF;">Last Name</th>
                <th style="background-color:#174793;color:#FFF;">Email</th>
                <th style="background-color:#174793;color:#FFF;">Password</th>
                <th style="background-color:#174793;color:#FFF;">Image</th>
                <th style="background-color:#174793;color:#FFF;">Role </th>
                <th style="background-color:#174793;color:#FFF;">Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayEmployeeData(); ?>
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
                <h5 class="modal-title" id="addEmployee" style="font-weight:900;color:#FFF">Add Employee</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="Train Operator">Train Operator</option>
                            <option value="Ticket Inspector">Ticket Inspector</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                        <i class="far fa-eye"></i></button>
    </div>
</div>

<div class="mb-3">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
        <button type="button" class="btn btn-outline-secondary toggle-password" data-target="confirmpassword">
            <i class="far fa-eye"></i>
        </button>
    </div>
</div>


                    <div class="modal-footer border-0" style="float:right;">                    
                    <button type="submit" class="btn btn-success" id="signup" name="signup">Create account</button>
                    </div >
                </div>
        </div>
    </div>
</div>
</form>

<script>
    $(document).ready(function () {
        $('.toggle-password').click(function () {
            var targetInputId = $(this).data('target');
            var passwordInput = $('#' + targetInputId);

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                $(this).find('i').removeClass('far fa-eye').addClass('far fa-eye-slash');
            } else {
                passwordInput.attr('type', 'password');
                $(this).find('i').removeClass('far fa-eye-slash').addClass('far fa-eye');
            }
        });
    });
</script>



<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Employee</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="editForm" action="edit_employee.php" method="post" onsubmit="validateEditForm(); return false;">

                    <!-- Add your form fields for editing here -->
                    <input type="hidden" id="editEmployeeId" name="editEmployeeId" value="">
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
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Role</label>
                        <select class="form-select" id="editRole" name="editRole" required>
                            <option value="Train Operator">Train Operator</option>
                            <option value="Ticket Inspector">Ticket Inspector</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="editPasswordCheckbox" onchange="toggleEditPassword()">
                        <label class="form-check-label" for="editPasswordCheckbox">Edit Password</label>
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Password</label>
                        <input type="text" class="form-control" id="editPassword" name="editPassword" required readonly>
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
                <p style="padding:10px">Are you sure you want to delete this employee?</p>
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
    function editEmployee(empId) {
    // Fetch the current data of the selected employee
    var empFirstName = $('#dynamicTableBody').find('tr[data-id="' + empId + '"] td:nth-child(2)').text();
    var empLastName = $('#dynamicTableBody').find('tr[data-id="' + empId + '"] td:nth-child(3)').text();
    var empEmail = $('#dynamicTableBody').find('tr[data-id="' + empId + '"] td:nth-child(4)').text();
    var empRole = $('#dynamicTableBody').find('tr[data-id="' + empId + '"] td:nth-child(7)').text();
    var empPassword = $('#dynamicTableBody').find('tr[data-id="' + empId + '"] td:nth-child(5)').text(); // Assuming password is in the 5th column

    // Set values in the edit modal
    $('#editEmployeeId').val(empId);
    $('#editFirstName').val(empFirstName);
    $('#editLastName').val(empLastName);
    $('#editEmail').val(empEmail);
    $('#editRole').val(empRole);
    $('#editPassword').val(empPassword);

    // Open the edit modal
    $('#editModal').modal('show');
}

</script>
      <script>
        // JavaScript functions for button

    function deleteEmployee(empId) {
        // Set the employee ID to be deleted
        $('#deleteModal').data('empId', empId);
        // Open the delete confirmation modal
        $('#deleteModal').modal('show');
    }

    function confirmDelete() {
        // Get the employee ID to be deleted
        var empId = $('#deleteModal').data('empId');

        // Add logic for deleting an employee
        $.ajax({
            url: 'delete_employee.php',
            method: 'POST',
            data: { empId: empId },
            success: function(response) {
                // Log the response from the server
                console.log(response);

                // If deletion is successful, reload the page
                if (response === "Employee deleted successfully") {
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

    <script>
    function toggleEditPassword() {
        var passwordInput = $('#editPassword');
        var passwordCheckbox = $('#editPasswordCheckbox');

        if (passwordCheckbox.prop('checked')) {
            // If the checkbox is checked, make the password input editable
            passwordInput.prop('readonly', false);
        } else {
            // If the checkbox is not checked, make the password input readonly
            passwordInput.prop('readonly', true);
        }
    }

    function validateEditForm() {
        // Check if the password input is readonly
        var isPasswordReadonly = $('#editPassword').prop('readonly');

        // If the password is readonly, set its value to an empty string
        if (isPasswordReadonly) {
            $('#editPassword').val('');
        }

        // Add any other validation logic if needed

        // Submit the form
        $('#editForm').submit();
    }
</script>


   </body>
</html>