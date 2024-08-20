<?php
// Start the session
session_start();

include("admin/inc/config.php"); // Replace 'db_connect.php' with your database connection file


// Check if the user is logged in and retrieve user data, including the profile picture
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        // Other user data retrieval
    } else {
        // Handle the case where user data is not found
        $profile_picture = 'default_profile.jpg'; // Set a default profile picture
    }
}

$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';
$stationQuery = "SELECT station_name, station_value FROM stations"; // Replace 'stations' with your actual table name
$stationResult = mysqli_query($conn, $stationQuery);

$stationOptions = array();
while ($row = mysqli_fetch_assoc($stationResult)) {
    $stationName = $row['station_name'];
    $stationValue = $row['station_value'];
    $stationOptions[$stationName] = $stationValue;
}

function getFare($origin, $destination, $conn) {
    $route = "$origin - $destination";
    return getFareByRoute($route, $conn);
}

if (isset($_SESSION['user_id'])) {
    // User is logged in, include the logged-in navigation
    include('header2.php');
} else {
    // User is not logged in, include the main navigation
    include('header.php');
}

mysqli_close($conn);
?>
<div class="box">
<div style="display: flex; align-items: center; background-image: url('images/banner_blue.png'); background-size: 100% 100%; height: 130px; ">
    <div style="text-align: center; flex-grow: 1; padding: 20px;">
        <h1 style="font-size: 45px; font-weight: 900; color: white; padding: 30px 0px 10px 0px; margin: 0;">FARES</h1>
    </div>
</div>
</div>
<br><br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Responsive Side Navbar</title>
    <link rel="stylesheet" type="text/css" href="style-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .mh .dropdown-menu {
            max-height: 115px;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            background-color: #FFF !important;
            font-weight:700;
            width: 80%;
            overflow-x: hidden;
            color: black !important;
        }

        .dropdown-item.active {
            background-color: #174793;
            color: #FFF;
            width: 100%;
            font-weight: 900;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 6px;
        }

        .btn.dropdown-toggle.btn-light {
        background-color: #FFC30B;
        }

        #startDate{
            cursor: pointer;
        }

        .custom-select{
        background-color: #FFC30B;
        color: #333;
        border: 1px solid  #FFC30B;
        border-radius: 5px;
        font-size: 15px;
        }

        .form-check.form-switch .form-check-input[type="checkbox"] {
        transform: scale(1.5); 
        float:right;
        }

        .form-switch .form-check-input:checked {
        background-color: #174793;
        border: solid #174793 1px;
        }
        .advisory{
            margin: 0px 50px 20px 50px;
            font-weight: 900;
        }
    </style>

<body>
    <div class ="advisory">
    <p style= "font-size: 35px"> <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg> TRAIN ADVISORY </p>
    <p> Effective JULY 1, 2017, the Philippine National Railways will increase its fare to a minimum of Php 15.00 (for the 1st 14 km) and additional Php_5.00 for every zone travelled. Passengers caught without tickets or short ticketed will be charged the farthest distance fare Manila-Alabang Php 30.00/ Manila-Calamba Php 60.00 </p>
    <p> <i> Note: Subject to 20% discount for Senior Citizen and Person with Disabilily. </i></p>
    </div> <br>
<div class="contents">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-box yellow-box">
                </div>
                <div class="custom-box blue-box">

                <div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-6 pt-3">
            <p style="font-weight: 900; margin: 10px 50px 10px 20px;">Origin Station</p>
            <div class="orig" style="font-weight: 900; padding: 3px 0px 10px 20px;">
                <select class="selectpicker border rounded mh" data-live-search="true" data-width="90%" id="originStation" data-dropup-auto="false">
                    <option value="Station">Select Station</option>
                            <?php
                                $index = 1; // Reset the index for destination station IDs
                                foreach ($stationOptions as $stationName => $stationValue) {
                                    echo '<option value="' . $stationValue . '" data-station-id="' . $index . '">' . $stationName . '</option>';
                                    $index++;
                                }
                            ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 pt-3">
            <p style="font-weight: 900; margin: 10px 50px 10px 20px;">Destination Station</p>
            <div class="dest" style="font-weight: 900; padding: 3px 0px 10px 20px;">
                <select class="selectpicker border rounded mh" data-live-search="true" data-width="90%" id="destinationStation" data-dropup-auto="false">
                    <option value="Station">Select Station</option>
                                <?php
                                $index = 1; // Reset the index for destination station IDs
                                foreach ($stationOptions as $stationName => $stationValue) {
                                    echo '<option value="' . $stationValue . '" data-station-id="' . $index . '">' . $stationName . '</option>';
                                    $index++;
                                }
                            ?>
                            </select>
                        </div>     
                        </div>
                                        
                    </div>
                </div>

                <table class="table table-bordered table-striped bord">
                    <thead>
                        <tr>
                        <th scope="col" style="border-width:4px" >Route</th>
                        <th scope="col" style="border-width:4px" >Direction</th>
                        <th scope="col" style="border-width:4px" >Fare</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row" style="border-width:4px;width:400px;" id="routeCell">Origin - Destination </th>
                        <td style="border-width:4px;font-weight:900;" id="directionCell"></td>
                        <td style="border-width:4px;width:150px;font-weight:900;" id="fareTable">0.00</td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="BuyNow" style="padding-bottom:3%">
                    <button type="submit" class="btn button-20" id="buyNowButton" style="display:block;margin-left:auto;margin-right:4%;">Check Discount</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight:900;">Your Ticket</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p style="font-weight:900;margin-bottom:0;">Number of Tickets</p>
                    <input type="number" class="form-control" id="numTickets" name="numTickets" min="1" value="1" style="border:solid black 2px;" required>
                </div>

                <div id="ticketSelections">
                    <!-- Select pickers will be added here dynamically -->
                </div>

            </div>
            <div class="modal-footer text-center border-0">
                <button type="button" class="btn button-20" data-bs-toggle="modal" data-bs-target="#secondModal" style="margin: 0 auto;">Proceed</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="secondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title fs-5" id="secondModalLabel" style="font-weight:900;">Total Amount</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p style="font-weight:900;margin-bottom:0;">Route</p>
                    <input type="text" class="form-control" id="route" name="route" style="border:solid black 2px;font-weight:900;" readonly>

                    <p style="font-weight:900;margin-bottom:0;margin-top:10px;">Total</p>
                    <input type="text" class="form-control" id="total" name="total" style="border:solid black 2px;font-weight:900;" value="" readonly>
                                
                    

                </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>

<script>
        // Get references to the routeCell and dateCell elements
        const routeCell = document.getElementById("routeCell");
        const dateCell = document.getElementById("dateCell");

        // Get references to the input fields in the modal
        const routeInput = document.getElementById("route");
        const dateTripInput = document.getElementById("dateTrip");

        // Add an event listener to the modal's show.bs.modal event
        const secondModal = document.getElementById("secondModal");
        secondModal.addEventListener("show.bs.modal", function () {
            // Set the value of the input fields in the modal
            routeInput.value = routeCell.innerText.trim();
            dateTripInput.value = dateCell.innerText.trim();
        });
    </script>

<script>
        $(document).ready(function () {
            // Function to generate select pickers based on the number of tickets
            function generateSelectPickers() {
                const numTickets = parseInt($("#numTickets").val());
                const ticketSelections = document.getElementById("ticketSelections");

                // Clear existing select pickers
                ticketSelections.innerHTML = "";

                // Generate select pickers
                for (let i = 1; i <= numTickets; i++) {
                    const ticketSelect = `
                        <div class="form-group">
                            <p class="ticket" style="font-weight:900;margin-top:10px;margin-bottom:0;">Ticket ${i}</p>
                            <div class="passtype" style="font-weight:900;margin:0px 0px 10px 0px;">
                                <select class="form-select custom-select passenger-type" id="PassengerType${i}" onchange="calculateTotalFare()">
                                    <option value="Regular" style="background-color: #FFF">Regular Passenger</option>
                                    <option value="PWD" style="background-color: #FFF">PWD</option>
                                    <option value="Senior Citizen" style="background-color: #FFF">Senior Citizen</option>
                                    <option value="Student" style="background-color: #FFF">Student</option>
                                </select>
                            </div>
                        </div>
                    `;

                    ticketSelections.innerHTML += ticketSelect;
                }
            }

            // Initial generation of select pickers
            generateSelectPickers();

            // Event listener for changes in the number of tickets input
            $("#numTickets").on("change", function () {
                generateSelectPickers();
            });
        });
</script>
<script>
// Wait for the document to be ready
document.addEventListener("DOMContentLoaded", function () {
    // Get references to origin and destination select pickers
    const originStation = document.getElementById("originStation");
    const destinationStation = document.getElementById("destinationStation");

    // Store the initial destination options HTML
    const initialDestinationOptions = destinationStation.innerHTML;

    // Add an event listener to the origin select picker
    originStation.addEventListener("change", function () {
        // Get the selected station ID of the origin
        const selectedOriginStationId = originStation.options[originStation.selectedIndex].getAttribute("data-station-id");

        // Clear the current destination options
        destinationStation.innerHTML = initialDestinationOptions;

        // Remove the option with the same station ID as the selected origin
        if (selectedOriginStationId) {
            const destinationOptions = destinationStation.querySelectorAll("option");
            destinationOptions.forEach(function (option) {
                const destinationStationId = option.getAttribute("data-station-id");
                if (destinationStationId === selectedOriginStationId) {
                    option.remove();
                }
            });
        }
        // Refresh the Bootstrap Select picker to reflect the changes
        $('#destinationStation').selectpicker('refresh');
    });
});
</script>
<script>
// Wait for the document to be ready
document.addEventListener("DOMContentLoaded", function () {
    // Get references to elements
    const originStation = document.getElementById("originStation");
    const destinationStation = document.getElementById("destinationStation");
    const startDate = document.getElementById("startDate");
    const fareTable = document.getElementById("fareTable");
    const buyNowButton = document.getElementById("buyNowButton");

    // Function to check conditions and show the modal
    // Function to check conditions and show the modal
function checkAndShowModal() {
    // Check if both select pickers have a value selected
    if (originStation.value !== "Station" && destinationStation.value !== "Station") {
        // Check if the selected origin and destination are not the same
        if (originStation.value !== destinationStation.value) {
            // Check if the fare in the table is not zero
            if (parseFloat(fareTable.textContent) !== 0) {
                // If all conditions are met, show the modal
                $('#staticBackdrop').modal('show');
            } else {
                alert("Fare in the table must not be zero.");
            }
        } else {
            alert("Origin and destination stations cannot be the same.");
        }
    } else {
        alert("Please select both origin and destination stations.");
    }
}


    // Add a click event listener to the Buy Now button
    buyNowButton.addEventListener("click", checkAndShowModal);
});
</script>
<!-- Bootstrap 5 JavaScript and Popper.js (for the responsive menu) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
</script>

<script>
    // Get the current date in the format YYYY-MM-DD
    const today = new Date().toISOString().split('T')[0];
    // Set the minimum date for the input field
    document.querySelector('#startDate').setAttribute('min', today);
</script>
<script>
// Function to calculate the total fare for a single ticket
function calculateSingleTicketFare(passengerType, baseFare) {
    let discount = 0.0;
    
    // Check if the passenger type is eligible for a discount
    if (passengerType === "PWD" || passengerType === "Senior Citizen" || passengerType === "Student") {
        // Apply a 20% discount
        discount = 0.2;
    }
    
    // Calculate the discounted fare
    const discountedFare = baseFare - (baseFare * discount);
    
    return discountedFare;
}

// Function to calculate the overall total fare for all tickets
function calculateTotalFare() {
    const numTickets = parseInt($("#numTickets").val());
    const baseFare = parseFloat($("#fareTable").text().replace("₱ ", ""));
    let totalFare = 0.0;
    
    // Calculate the total fare for all tickets
    for (let i = 1; i <= numTickets; i++) {
        const passengerType = $("#PassengerType" + i).val();
        const fare = calculateSingleTicketFare(passengerType, baseFare);
        totalFare += fare;
    }
    
    // Display the overall total fare
    $("#total").val("₱ " + totalFare.toFixed(2));
}

// Add an event listener to the passenger type select pickers
$(".passenger-type").on("change", function () {
    calculateTotalFare();
});

</script>


<script>
   // Function to update the table with selected values and calculated fare
// Update the table with selected values and calculated fare
function updateTable() {
    var originStation = $("#originStation").val();
    var destinationStation = $("#destinationStation").val();
    var date = $("#startDate").val();

    // Get the fare and direction from the database based on the selected stations
    $.ajax({
        url: "get_fare.php", // Create a separate PHP file to handle this AJAX request
        type: "POST",
        data: { origin: originStation, destination: destinationStation },
        dataType: "json", // Specify that the response is JSON
        success: function (response) {
            var fare = parseFloat(response.fare);
            var direction = response.Direction;

            if (!isNaN(fare)) {
                // Update the table cells with selected values and calculated fare
                $("#routeCell").text(originStation + " - " + destinationStation);
                $("#dateCell").text(date);
                $("#directionCell").text(direction);
                $("#fareTable").text("₱ " + fare.toFixed(2));
                calculateTotalFare(); // Recalculate total fare with new fare value
            } else {
                // Handle the case where the fare data is not available
                // You can display an error message or take appropriate action here
            }
        },
    });
}

    $("#originStation, #destinationStation, #startDate").on("change", function() {
    updateTable();
});

// Initial calculation when the page loads
updateTable();
</script>
</body>
</html>

<?php require_once('footer.php'); ?>
