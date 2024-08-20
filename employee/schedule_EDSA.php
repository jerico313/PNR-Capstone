<?php
require_once('header.php');
require_once('sidenav.php');
require_once('../admin/inc/config.php');

// Function to fetch and display fare data
function displayEDSA() {
    include("../admin/inc/config.php");

    $sql = "SELECT * FROM edsa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['schedule_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['direction'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editSchedule(" . $row['schedule_id'] . ")'>Edit</button> ";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteSchedule(" . $row['schedule_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

function displayTutubanEDSA() {
    include("../admin/inc/config.php");

    $sql = "SELECT * FROM tutuban_edsa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['schedule_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['direction'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editTutuban(" . $row['schedule_id'] . ")'>Edit</button> ";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteTutuban(" . $row['schedule_id'] . ")'>Delete</button>";            
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $period = $_POST['period'];
    $status = $_POST['status'];
    $direction = $_POST['direction'];
    
    // Combine the hour, minute, and period to form the time string
    $hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
    $minute = str_pad($minute, 2, "0", STR_PAD_LEFT);
    
    $time = $hour . ':' . $minute . ' ' . $period;
    
    include("../admin/inc/config.php");
    
    if ($_POST['direction'] == "Northbound") {
        // Check if the time already exists in the database
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM edsa WHERE time = ?");
    } elseif ($_POST['direction'] == "Southbound") {
        // Check if the time already exists in the database
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM tutuban_edsa WHERE time = ?");
    } else {
        // Handle invalid direction
        echo '<script>alert("Invalid direction selected");</script>';
        exit(); // Stop further execution
    }
    
    $checkStmt->bind_param("s", $time);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();
    
    if ($count > 0) {
        // Record with the same time already exists, handle accordingly (display error or update the existing record)
        echo "<script>alert('Record with the same time already exists'); window.location = 'schedule_EDSA.php';</script>";
    } else {
        // Proceed with database insertion
        if ($_POST['direction'] == "Northbound") {
            $stmt = $conn->prepare("INSERT INTO edsa (time, status, direction) VALUES (?, ?, ?)");
        } elseif ($_POST['direction'] == "Southbound") {
            $stmt = $conn->prepare("INSERT INTO tutuban_edsa (time, status, direction) VALUES (?, ?, ?)");
        } else {
            // Handle invalid direction
            echo '<script>alert("Invalid direction selected");</script>';
            exit(); // Stop further execution
        }
    
        $stmt->bind_param("sss", $time, $status, $direction);
    
        // Perform database insertion
        if ($stmt->execute()) {
            // Record added successfully
            echo "<script>alert('Record added successfully'); window.location = 'schedule_EDSA.php';</script>";
            if ($_POST['direction'] == "Southbound") {
                echo "<script>displayTutubanEDSA();</script>"; // Call the function to display data for Alabang
            } elseif ($_POST['direction'] == "Northbound") {
                echo "<script>displayEDSA();</script>"; // Call the function to display data for Tutuban
            }
        } else {
            // Error occurred, show JavaScript alert with the error message
            echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        }
    
        $stmt->close();
    }
    
    $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <style>
         .nav-link {
            margin-top:9px;
            border-radius: 15px 15px 0px 0px;
            border: solid none 1px;
            
         }

         .nav-link:hover {
            margin-top:9px;
            border-radius: 15px 15px 0px 0px;
            border: solid none 1px;
            

         }

         .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            background-color: #FFF; /* Change this to your desired background color */
            border-radius: 15px 15px 0px 0px;
            border: solid none 1px;
            font-weight:900;
            color:#555555 !important;
           
         }
         .yellow-box {
            background-color: #174793;
            color: #FFF;
            border-radius: 15px 15px 0px 0px;
            height: 45px;
            display: flex;
            align-items: center;
            padding: 0px 0px 0 10px;
        }

.blue-box {
    background-color:#FFF;
    border-radius: 0px 0px 15px 15px;
    height: auto;
    border-top-style: solid 1px;
    border-top-color: #DEE2E6;
}

.content {
    margin-left: 260px;
    margin-top: 5px;
    padding: 20px;
}
      </style>
   </head>
   <body>
<div class="reset" style="padding-top: 120px; padding-bottom: 0px; text-align: right;padding-right:30px">
    <button type="button" class="btn btn-danger" id="resetStatusButton" style="display: inline-block;  margin-right: 10px;">Reset Status</button>
    <button type="button" class="btn btn-info" style="display: inline-block;background-color: #174793;border:solid 1px #174793;color:#FFF;" onclick="downloadTables()">Download Schedule <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></button>
</div>
<div class="modal fade" id="confirmResetModal" tabindex="-1" aria-labelledby="deleteModalTutubanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);border-radius: 12px;border: 1px solid rgba(209, 213, 219, 0.3);">
            <div class="modal-body">
                <input type="hidden" id="deleteScheduleId" name="deleteScheduleId" value="">
                <center>
                    <p style="padding:10px">Are you sure you want to reset the status?</p>
                </center>
            </div>
            <div class="modal-footer  text-center">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:transparent;margin: 0 auto;">Cancel</button>
                <button type="button" class="btn" id="confirmResetBtn" style="background-color:transparent;margin: 0 auto;color: red;">Reset</button>
            </div>
        </div>
    </div>
</div>

   <div class="content ">
      <div class="container">
      <div class="row">
            <div class="col-md-12">
                <div class="custom-box yellow-box">
                <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link active" data-bs-toggle="tab" href="#EDSAtoTutuban" style="color:#FFC30B;font-weight:900;">EDSA to Tutuban</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-bs-toggle="tab" href="#TutubantoEDSA" style="color: #FFC30B;font-weight:900;">Tutuban to EDSA</a>
            </li>
         </ul>
         <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Schedule</button>
                </div>
         
         <div class="custom-box blue-box">
         <div class="tab-content">
            <div id="EDSAtoTutuban" class="tab-pane fade show active">
            <table id="edsa" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
            <th style="background-color:#174793;color:#FFF;">No.</th>
            <th style="background-color:#174793;color:#FFF;">Time</th>
            <th style="background-color:#174793;color:#FFF;">Status</th>
            <th style="background-color:#174793;color:#FFF;">Direction</th>
            <th style="background-color:#174793;color:#FFF;">Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayEDSA(); ?>
        <!-- Modal for Edit and Delete in Alabang-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);border-radius: 12px;border: 1px solid rgba(209, 213, 219, 0.3);">
            <div class="modal-body">
            <input type="hidden" id="deleteScheduleId" name="deleteScheduleId" value="">
                <center>
                <p style="padding:10px">Are you sure you want to delete this Schedule?</p>
                </center>
            </div>
            <div class="modal-footer  text-center">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:transparent;margin: 0 auto;">Cancel</button>
                <button type="button" class="btn" onclick="confirmDelete()" style="background-color:transparent;margin: 0 auto;color: red;">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Schedule</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form id="editForm" action="edit_schedule_EDSA.php" method="post">
                     <input type="hidden" id="editScheduleId" name="editScheduleId" value="">
                     <div class="mb-3">
                        <label for="edithour" class="form-label">Hour:</label>
                        <input type="number" class="form-control" id="edithour" name="edithour" min="1" max="12" required>
                    </div>
                    <div class="mb-3">
                        <label for="editminute" class="form-label">Minute:</label>
                        <input type="number" class="form-control" id="editminute" name="editminute" min="0" max="59" required>
                    </div>
                    <div class="mb-3">
                        <label for="editperiod" class="form-label">AM/PM:</label>
                        <select class="form-select" id="editperiod" name="editperiod" required>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editstatus" class="form-label">Status:</label>
                        <input type="text" class="form-control" id="editstatus" name="editstatus">
                    </div>
                    <div class="mb-3">
                        <label for="editdirection" class="form-label">Direction</label>
                        <select class="form-select" id="editdirection" name="editdirection" required>
                            <option value="" disabled selected>Select Direction</option>
                            <option value="Southbound">Southbound</option>
                            <option value="Northbound">Northbound</option>
                        </select>
                     <div class="modal-footer border-0" style="float:right;">
                        <button type="submit" class="btn btn-success">Save changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
        </tbody>
        </table>
        
            </div>
            <div id="TutubantoEDSA" class="tab-pane fade">
               <table id="tutuban_edsa" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
            <th style="background-color:#174793;color:#FFF;">No.</th>
            <th style="background-color:#174793;color:#FFF;">Time</th>
            <th style="background-color:#174793;color:#FFF;">Status</th>
            <th style="background-color:#174793;color:#FFF;">Direction</th>
            <th style="background-color:#174793;color:#FFF;">Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBodyTutuban">
        <?php displayTutubanEDSA();?>
        <!-- Modal for Edit and Delete in Tutuban-->
<div class="modal fade" id="deleteModalTutuban" tabindex="-1" aria-labelledby="deleteModalTutubanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="backdrop-filter: blur(16px) saturate(180%);-webkit-backdrop-filter: blur(16px) saturate(180%);background-color: rgba(255, 255, 255, 0.40);border-radius: 12px;border: 1px solid rgba(209, 213, 219, 0.3);">
            <div class="modal-body">
                <input type="hidden" id="deleteScheduleId" name="deleteScheduleId" value="">
                <center>
                    <p style="padding:10px">Are you sure you want to delete this Schedule?</p>
                </center>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color:transparent;margin: 0 auto;">Cancel</button>
                <button type="button" class="btn" onclick="confirmDeleteTutuban()" style="background-color:transparent;margin: 0 auto;color: red;">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModalTutuban" tabindex="-1" aria-labelledby="editModalTutubanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTutubanLabel" style="font-weight:900;color:#FFF">Edit Schedule</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editFormTutuban" action="edit_schedule_tutuban_EDSA.php" method="post">
                    <input type="hidden" id="editScheduleIdtutuban" name="editScheduleIdtutuban" value="">
                    <div class="mb-3">
                        <label for="edithourtutuban" class="form-label">Hour:</label>
                        <input type="number" class="form-control" id="edithourtutuban" name="edithourtutuban" min="1" max="12" required>
                    </div>
                    <div class="mb-3">
                        <label for="editminutetutuban" class="form-label">Minute:</label>
                        <input type="number" class="form-control" id="editminutetutuban" name="editminutetutuban" min="0" max="59" required>
                    </div>
                    <div class="mb-3">
                        <label for="editperiodtutuban" class="form-label">AM/PM:</label>
                        <select class="form-select" id="editperiodtutuban" name="editperiodtutuban" required>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editstatustutuban" class="form-label">Status:</label>
                        <input type="text" class="form-control" id="editstatustutuban" name="editstatustutuban">
                    </div>
                    <div class="mb-3">
                        <label for="editdirectiontutuban" class="form-label">Direction</label>
                        <select class="form-select" id="editdirectiontutuban" name="editdirectiontutuban" required>
                            <option value="" disabled selected>Select Direction</option>
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
        </tbody>
    </table>
          
            </div>
         </div>
      </div>
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
                <h5 class="modal-title" id="addFare" style="font-weight:900;color:#FFF">Schedule</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="hour" class="form-label">Hour:</label>
                        <input type="number" class="form-control" id="hour" name="hour" min="1" max="12" required>
                    </div>
                    <div class="mb-3">
                        <label for="minute" class="form-label">Minute:</label>
                        <input type="number" class="form-control" id="minute" name="minute" min="0" max="59" required>
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">AM/PM:</label>
                        <select class="form-select" id="period" name="period" required>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <input type="text" class="form-control" id="status" name="status" value="On Time" required>
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
                    <button type="submit" class="btn btn-success" id="signup" name="signup">Add Schedule</button>
                    </div >
                </div>
        </div>
    </div>
</div>
</form>
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>

      <!-- Script JS -->
      <script>
         $(document).ready(function() {
             $('#edsa').DataTable({        
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

         $(document).ready(function() {
             $('#tutuban_edsa').DataTable({
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
function downloadTables() {
    // Reload the page
    location.reload();

    const currentDate = new Date();
    const formattedDate = currentDate.toLocaleDateString().replace(/\//g, "-"); // Format date for file name

    const table1 = $('#edsa').DataTable().rows().data().toArray();
    const table2 = $('#tutuban_edsa').DataTable().rows().data().toArray();

    // Extracting data for "Time," "Status," and "Direction" columns for Table 1
    const filteredData1 = table1.map(row => [row[1], row[2], row[3]]);
    // Add title for Table 1
    filteredData1.unshift(['EDSA to Tutuban', `Date: ${formattedDate}`]);

    // Extracting data for "Time," "Status," and "Direction" columns for Table 2
    const filteredData2 = table2.map(row => [row[1], row[2], row[3]]);
    // Add title for Table 2
    filteredData2.unshift(['Tutuban to EDSA', `Date: ${formattedDate}`]);

    // Combine data from both tables
    const combinedData = [...filteredData1, ...filteredData2];

    const csvContent = "data:text/csv;charset=utf-8," + combinedData.map(row => row.join(",")).join("\n");
    const encodedUri = encodeURI(csvContent);

    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `schedule_edsa_tutuban_${formattedDate}.csv`);
    document.body.appendChild(link);

    link.click(); // Trigger the download
    document.body.removeChild(link);
}
</script>
<script>
function editSchedule(scheduleId) {
    // Fetch the current data of the selected schedule
    var scheduleTime = $('#dynamicTableBody').find('tr[data-id="' + scheduleId + '"] td:nth-child(2)').text();
    var scheduleStatus = $('#dynamicTableBody').find('tr[data-id="' + scheduleId + '"] td:nth-child(3)').text();
    var scheduleDirection = $('#dynamicTableBody').find('tr[data-id="' + scheduleId + '"] td:nth-child(4)').text();

    // Split the time to get hour, minute, and period
    var timeComponents = scheduleTime.split(' ');
    var hourMinute = timeComponents[0].split(':');
    var hour = hourMinute[0];
    var minute = hourMinute[1];
    var period = timeComponents[1];

    // Set values in the edit modal
    $('#editScheduleId').val(scheduleId);
    $('#edithour').val(hour);
    $('#editminute').val(minute);
    $('#editperiod').val(period);
    $('#editstatus').val(scheduleStatus);
    $('#editdirection').val(scheduleDirection);

    // Open the edit modal
    $('#editModal').modal('show');
}

function deleteSchedule(scheduleId) {
    // Set the schedule ID to be deleted
    $('#deleteScheduleId').val(scheduleId);
    // Open the delete confirmation modal
    $('#deleteModal').modal('show');
}

function confirmDelete() {
    // Get the schedule ID to be deleted
    var scheduleId = $('#deleteScheduleId').val();

    // Add logic for deleting a schedule
    $.ajax({
        url: 'delete_EDSA.php',
        method: 'POST',
        data: { scheduleId: scheduleId },
        success: function(response) {
    // Log the response from the server
    console.log(response);

    // Parse the JSON response
    var jsonResponse = JSON.parse(response);

    // Check if the deletion was successful
    if (jsonResponse.success) {
        // If deletion is successful, remove the row from the table
        location.reload(); // Reload the page or remove the row using jQuery
    } else {
        // If there's an error, show an alert with the error message
        alert('Error: ' + jsonResponse.message);
    }

    // Close the delete confirmation modal
    $('#deleteModal').modal('hide');
},

    });
}
</script>
<script>
function editTutuban(scheduleId) {
    // Fetch the current data of the selected schedule
    var scheduleTime = $('#dynamicTableBodyTutuban').find('tr[data-id="' + scheduleId + '"] td:nth-child(2)').text();
    var scheduleStatus = $('#dynamicTableBodyTutuban').find('tr[data-id="' + scheduleId + '"] td:nth-child(3)').text();
    var scheduleDirection = $('#dynamicTableBodyTutuban').find('tr[data-id="' + scheduleId + '"] td:nth-child(4)').text();

    // Split the time to get hour, minute, and period
    var timeComponents = scheduleTime.split(' ');
    var hourMinute = timeComponents[0].split(':');
    var hour = hourMinute[0];
    var minute = hourMinute[1];
    var period = timeComponents[1];

    // Set values in the edit modal
    $('#editScheduleIdtutuban').val(scheduleId);
    $('#edithourtutuban').val(hour);
    $('#editminutetutuban').val(minute);
    $('#editperiodtutuban').val(period);
    $('#editstatustutuban').val(scheduleStatus);
    $('#editdirectiontutuban').val(scheduleDirection);

    // Open the edit modal
    $('#editModalTutuban').modal('show');
}

    function deleteTutuban(scheduleId) {
        // Set the schedule ID to be deleted
        $('#deleteScheduleId').val(scheduleId);
        // Open the delete confirmation modal
        $('#deleteModalTutuban').modal('show');
    }

    function confirmDeleteTutuban() {
        // Get the schedule ID to be deleted
        var scheduleId = $('#deleteScheduleId').val();

        // Add logic for deleting a schedule
        $.ajax({
            url: 'delete_tutuban_EDSA.php',
            method: 'POST',
            data: { scheduleId: scheduleId },
            success: function(response) {
                // Log the response from the server
                console.log(response);

                // Parse the JSON response
                var jsonResponse = JSON.parse(response);

                // Check if the deletion was successful
                if (jsonResponse.success) {
                    // If deletion is successful, remove the row from the table
                    location.reload(); // Reload the page or remove the row using jQuery
                } else {
                    // If there's an error, show an alert with the error message
                    alert('Error: ' + jsonResponse.message);
                }

                // Close the delete confirmation modal
                $('#deleteModalTutuban').modal('hide');
            },
        });
    }
</script>
<script>
    $(document).ready(function () {
        // Your existing JavaScript code...

        $('#resetStatusButton').click(function () {
            // Open the confirmation modal
            $('#confirmResetModal').modal('show');
        });

        // Handle reset confirmation
        $('#confirmResetBtn').click(function () {
            // Make an AJAX request to reset_status.php
            $.ajax({
                url: 'reset_status_EDSA.php',
                method: 'POST',
                success: function (response) {
                    console.log(response);

                    var jsonResponse = JSON.parse(response);

                    if (jsonResponse.success) {
                        $('.status-text').text('');
                        $('.status-text-tutuban').text('');
                        location.reload();
                    } else {
                        alert('Error: ' + jsonResponse.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error: Unable to reset status');
                }
            });

            // Close the confirmation modal
            $('#confirmResetModal').modal('hide');
        });

        // Your existing JavaScript code...
    });
</script>
</body>
</html>
