<?php
require_once('header.php');
require_once('sidenav.php');

// Include your database connection file if not included already
require_once('inc/config.php');

// Function to fetch and display slider data
function displaySliderData() {
   include("inc/config.php");

    $sql = "SELECT * FROM sliders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-id='" . $row['slider_id'] . "'>";
            echo "<td>" . $count . "</td>";
            echo "<td><img src='../assets/uploads/" . $row['slider_image'] . "' alt='...' style='width:350px;height:150px;'></td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick='editSlider(" . $row['slider_id'] . ")'>Edit</button> ";
            echo "<button class='btn btn-danger btn-sm' onclick='deleteSlider(" . $row['slider_id'] . ")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            $count++;
        }
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve file details
    $fileTmpPath = $_FILES['slider_image']['tmp_name'];
    $fileName = $_FILES['slider_image']['name'];
    $fileSize = $_FILES['slider_image']['size'];
    $fileType = $_FILES['slider_image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Generate a unique name for the uploaded file
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // Set the upload directory
    $uploadDirectory = "../assets/uploads/";

    // Move the uploaded file to the destination folder
    $destPath = $uploadDirectory . $newFileName;
    move_uploaded_file($fileTmpPath, $destPath);

    // Check if the slider image already exists in the database
    include("inc/config.php");

    $sliderCheck = "SELECT * FROM sliders WHERE slider_image = ?";
    $stmt = $conn->prepare($sliderCheck);
    $stmt->bind_param("s", $newFileName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Slider image already exists, show an error message
        echo "<script>alert('Slider image already exists. Please use a different image.');</script>";
    } else {
        // Slider image is unique, proceed with database insertion
        $sql = "INSERT INTO sliders (slider_image) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $newFileName);

        // Perform database insertion
        if ($stmt->execute()) {
            // Record added successfully
            echo "<script>alert('Record added successfully'); window.location = 'sliders.php';</script>";
            echo "<script>displaySliderData();</script>"; // Call the function to display data
        } else {
            // Error occurred, show JavaScript alert with the error message
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }
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
      <style>
    .preview-container {
        display: none;
    }

    #newSliderPreview:not([src=""]) {
        display: block;
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
                     <p style="color:#FFF;padding: 15px 10px 0 9px;"><strong>Sliders</strong></p>
                     <button type="submit" class="btn btn-submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:block;margin-left:auto;margin-right:10px;margin-top:0">Add Slider</button>
                  </div>
                  <div class="custom-box blue-box">
                     <table id="example" class="table table-striped bord" style="width:95%;margin-left:auto;margin-right:auto;">
                        <thead>
                           <tr>
                              <th style="background-color:#174793;color:#FFF;">No.</th>
                              <th style="background-color:#174793;color:#FFF;">Image</th>
                              <th style="background-color:#174793;color:#FFF;">Action</th>
                           </tr>
                        </thead>
                        <tbody id="dynamicTableBody">
                           <?php displaySliderData(); ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="addSlider" style="font-weight:900;color:#FFF">Slider</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style=""></button>
               </div>
               <div class="modal-body">
                  <div class="mb-3">
                     <label for="slider_image" class="form-label">Slider Image</label>
                     <input type="file" class="form-control" id="slider_image" name="slider_image" accept="image/*" required>
                  </div>
                  <div class="mb-3 preview-container">

                    <label for="newSliderPreview" class="form-label">New Image Preview</label>
                    <img src="" id="newSliderPreview" alt="New Image Preview" style="max-width: 100%; height: auto;">
                    </div>

                  <div class="modal-footer border-0" style="float:right;">
                     <button type="submit" class="btn btn-success" id="addSliderBtn" name="addSliderBtn">Add Slider</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>

      <!-- Edit Modal -->
      <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel" style="font-weight:900;color:#fff;">Edit Slider</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
         <form id="editForm" action="edit_sliders.php" method="post" enctype="multipart/form-data">
               <!-- Add your form fields for editing here -->
               <input type="hidden" id="editSliderId" name="editSliderId" value="">
               <div class="mb-3">
                  <label for="editSliderImage" class="form-label">Current Image</label>
                  <img src="" id="currentSliderImage" alt="Current Image" style="max-width: 100%; height: auto;">
               </div>
               <div class="mb-3">
                  <label for="editSliderImage" class="form-label">New Image</label>
                  <input type="file" class="form-control" id="editSliderImage" name="editSliderImage" accept="image/*">
               </div>
               <div class="modal-footer border-0">
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
               <p style="padding:10px">Are you sure you want to delete this slider?</p>
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
    // Function to preview the selected image for a new slider
    function previewNewImage(input) {
        var previewContainer = $('.preview-container');
        var newSliderPreview = $('#newSliderPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                newSliderPreview.attr('src', e.target.result);
                previewContainer.show();
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, hide the preview container
            previewContainer.hide();
        }
    }

    // Call the previewNewImage function when the input file changes
    $("#slider_image").change(function() {
        previewNewImage(this);
    });

   // Function to preview the selected image in the edit modal
   function previewEditImage(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
            $('#currentSliderImage').attr('src', e.target.result);
         }

         reader.readAsDataURL(input.files[0]);
      }
   }

   // Call the previewEditImage function when the input file changes
   $("#editSliderImage").change(function() {
      previewEditImage(this);
   });
</script>

        <script>
    function editSlider(sliderId) {
      // Fetch the current data of the selected slider
      var sliderImage = $('#dynamicTableBody').find('tr[data-id="' + sliderId + '"] td:nth-child(2) img').attr('src');

      // Set values in the edit modal
      $('#editSliderId').val(sliderId);
      $('#currentSliderImage').attr('src', sliderImage); // Display current image
      $('#editModal').modal('show');
   }

   // JavaScript functions for button
   function deleteSlider(sliderId) {
      // Set the slider ID to be deleted
      $('#deleteModal').data('sliderId', sliderId);
      // Open the delete confirmation modal
      $('#deleteModal').modal('show');
   }

   function confirmDelete() {
      // Get the slider ID to be deleted
      var sliderId = $('#deleteModal').data('sliderId');

      // Add logic for deleting a slider
      $.ajax({
         url: 'delete_slider.php',
         method: 'POST',
         data: { sliderId: sliderId },
         success: function(response) {
            // Log the response from the server
            console.log(response);

            // If deletion is successful, reload the page
            if (response === "Slider deleted successfully") {
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
