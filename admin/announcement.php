<?php
require_once('header.php');
require_once('sidenav.php');
?>

<?php
// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display announcement data
function displayAnnouncementData() {
    include("inc/config.php");

    $sql = "SELECT * FROM announcements";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['announcement_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . htmlspecialchars(strip_tags($row['description'])) . "</td>"; // Modify this line
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' style='width: 70px;' onclick='editAnnouncement(" . $row['announcement_id'] . ")'>Edit</button> ";
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
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12 pt-5">
                    <div class="custom-box yellow-box">
                        <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Announcement</strong></p>
                    </div>
                    <div class="custom-box blue-box">
                        <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                            <thead>
                                <tr>
                                    <th style="background-color:#174793;color:#FFF;">No.</th>
                                    <th style="background-color:#174793;color:#FFF;">Announcement</th>
                                    <th style="background-color:#174793;color:#FFF;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dynamicTableBody">
                                <?php displayAnnouncementData(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#FFF">Edit Announcement</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="editForm" action="edit_announcement.php" method="post">
    <!-- Add your form fields for editing here -->
    <input type="hidden" id="editAnnouncementId" name="editAnnouncementId" value="">
    <div class="mb-3">
        <label for="editAnnouncementName" class="form-label">Announcement</label>
        <div id="summernote" name="announcement_content"></div>
        <!-- Hidden input for announcement content -->
        <input type="hidden" id="editAnnouncementContent" name="announcement_content" value="">
    </div>
    <div class="modal-footer border-0" style="float:right;">
        <button type="button" id="editAnnouncementBtn" class="btn btn-success">Save changes</button>
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
                        <p style="padding:10px">Are you sure you want to delete this announcement?</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="./js/script1.js"></script>
    <!-- Script JS -->
    <script>
        $(document).ready(function () {
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
    $(document).ready(function () {
        // Initialize the SummerNote editor
        $('#summernote').summernote();

        // Handle form submission
        $('#editAnnouncementBtn').click(function (e) {
            // Prevent the default form submission
            e.preventDefault();

            // Get and set the content of the SummerNote editor to the hidden input field
            var announcementContent = $('#summernote').summernote('code');
            $('#editAnnouncementContent').val(announcementContent);

            // Submit the form
            $('#editForm').submit();
        });
    });
</script>

    <script>
        function editAnnouncement(announcementId) {
            // Fetch the current data of the selected announcement
            var announcementContent = $('#dynamicTableBody').find('tr[data-id="' + announcementId + '"] td:nth-child(2)').html();

            // Set values in the edit modal
            $('#editAnnouncementId').val(announcementId);
            $('#summernote').summernote('code', announcementContent);

            // Open the edit modal
            $('#editModal').modal('show');
        }
    </script>
    <script>
        // JavaScript functions for button
        function deleteAnnouncement(announcementId) {
            // Set the announcement ID to be deleted
            $('#deleteModal').data('announcementId', announcementId);
            // Open the delete confirmation modal
            $('#deleteModal').modal('show');
        }

        function confirmDelete() {
            // Get the announcement ID to be deleted
            var announcementId = $('#deleteModal').data('announcementId');

            // Add logic for deleting an announcement
            $.ajax({
                url: 'delete_announcement.php',
                method: 'POST',
                data: { announcementId: announcementId },
                success: function (response) {
                    // Log the response from the server
                    console.log(response);

                    // If deletion is successful, reload the page
                    if (response === "Announcement deleted successfully") {
                        location.reload(); // Reload the page
                    } else {
                        // If there's an unexpected response, show an alert
                        alert('Unexpected response: ' + response);
                    }

                    // Close the delete confirmation modal
                    $('#deleteModal').modal('hide');
                },
                error: function (error) {
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
