<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

include("admin/inc/config.php"); 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM accounts WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $profile_picture = $user_data['profile_picture'];
        $points = $user_data['points'];
        $phone = $user_data['phone'];
        $wallet = $user_data['wallet'];
    } else {
        $profile_picture = 'default_profile.jpg';
    }
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

if (isset($_SESSION['user_id'])) {
    include('header2.php');
    include('sidenav.php');
} else {
    include('header.php');
}

$stationQuery = "SELECT station_name, station_value FROM stations";
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

mysqli_close($conn);
?>

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
    .sub{
        z-index: 1;
        position:fixed;
        background-color:#FFF;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0) 0px 2px 4px -1px;
        padding-bottom:13px;
      }
      
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

        #loadingOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        align-items: center;
        justify-content: center;
        z-index: 2000; /* Set a higher z-index value */
        }
        .lds-grid {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        }
        .lds-grid div {
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #FFC30B;
        animation: lds-grid 1.2s linear infinite;
        }
        .lds-grid div:nth-child(1) {
        top: 8px;
        left: 8px;
        animation-delay: 0s;
        }
        .lds-grid div:nth-child(2) {
        top: 8px;
        left: 32px;
        animation-delay: -0.4s;
        }
        .lds-grid div:nth-child(3) {
        top: 8px;
        left: 56px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(4) {
        top: 32px;
        left: 8px;
        animation-delay: -0.4s;
        }
        .lds-grid div:nth-child(5) {
        top: 32px;
        left: 32px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(6) {
        top: 32px;
        left: 56px;
        animation-delay: -1.2s;
        }
        .lds-grid div:nth-child(7) {
        top: 56px;
        left: 8px;
        animation-delay: -0.8s;
        }
        .lds-grid div:nth-child(8) {
        top: 56px;
        left: 32px;
        animation-delay: -1.2s;
        }
        .lds-grid div:nth-child(9) {
        top: 56px;
        left: 56px;
        animation-delay: -1.6s;
        }
        @keyframes lds-grid {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        }
        @media (max-width: 768px) {
        .time-container {
          display: none;
        }
        .pnr {
          font-size: 20px; /* Adjust the font-size for smaller screens */
        }
        .sub{
          padding-bottom:0px;
          position:relative;
        }
        .pnrlogo {
        width: 91px; /* Adjust the size according to your preference */
        height: 91px;
      }
            
        }
</style>

<body>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-box yellow-box">
                    <p><strong>Choose Your Location</strong></p>
                </div>
                <div class="custom-box blue-box">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 pt-3">
                        <p  style="font-weight:900;margin:10px 50px 10px 20px;">Origin Station</p>
                        <div class="orig" style="font-weight:900;padding:3px 0px 10px 20px;">
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
                        <div class="col-lg-4 col-sm-6 pt-3" >
                        <p  style="font-weight:900;margin:10px 50px 10px 20px;">Destination Station</p>
                        <div class="dest" style="font-weight:900;padding:3px 0px 10px 20px;">
                            <select class="selectpicker border rounded mh" data-live-search="true" data-width="90%" id="destinationStation" data-dropup-auto="false">
                                <option value="Station" >Select Station</option>
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
                        <div class="col-lg-4 col-sm-6 pt-3">
                        <div class="date" style="padding:10px 50px 10px 20px;">
                        <p><strong>Date</strong></p>
                        <input id="startDate" class="form-control" type="date" style="background-color:#FFC30B;width:103%;" data-dropup-auto="false" min="<?php echo date('m-d-Y'); ?>"/>
                        </div>
                        </div>                 
                    </div>
                </div>

                <table class="table table-bordered table-striped bord">
                    <thead>
                        <tr>
                        <th scope="col" style="border-width:4px" >Route</th>
                        <th scope="col" style="border-width:4px" >Date</th>
                        <th scope="col" style="border-width:4px" >Direction</th>
                        <th scope="col" style="border-width:4px" >Fare</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row" style="border-width:4px;width:400px;" id="routeCell">Origin - Destination </th>
                        <td style="border-width:4px;width:200px;font-weight:900;" id="dateCell"></td>
                        <td style="border-width:4px;font-weight:900;" id="directionCell"></td>
                        <td style="border-width:4px;width:150px;font-weight:900;" id="fareTable">0.00</td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="BuyNow" style="padding-bottom:3%">
                    <button type="submit" class="btn button-20" id="buyNowButton" style="display:block;margin-left:auto;margin-right:4%;">Buy Now</button>
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
                <h3 class="modal-title fs-5" id="staticBackdropLabel" style="font-weight:900;">Buy Ticket</h3>
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
<form id="payNowForm" action="post_checkout.php" method="GET">
<div class="modal fade" id="secondModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title fs-5" id="secondModalLabel" style="font-weight:900;">Summary</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="userId" name="userId" value="<?php echo $user_id; ?>">
                    <input type="hidden" id="userId" name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" id="userName" name="userName" value="<?php echo $firstname . ' ' . $lastname; ?>">
                    <input type="hidden" id="fare" name="fare" >
                    
                    <p style="font-weight:900;margin-bottom:0;">Number of Ticket</p>
                    <input type="text" class="form-control" id="ticket" name="ticket" style="border:solid black 2px;font-weight:900;" readonly>

                    <p style="font-weight:900;margin-bottom:0;margin-top:10px;">Route</p>
                    <input type="text" class="form-control" id="route" name="route" style="border:solid black 2px;font-weight:900;" readonly>

                    <p style="font-weight:900;margin-bottom:0;margin-top:10px;">Date</p>
                    <input type="text" class="form-control" id="dateTrip" name="dateTrip" style="border:solid black 2px;font-weight:900;" readonly>

                    <p style="font-weight:900;margin-bottom:0;margin-top:10px;">Total</p>
                    <input type="text" class="form-control" id="total" name="total" style="border:solid black 2px;font-weight:900;" value="" readonly>
                                
                    <p style="font-weight:900;maegint-left:0;position:absolute;margin-top:10px;">Redeem <?php echo $points; ?> Points</p>

                    <div class="form-check form-switch" style="margin:10px 10px 0px 10px">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                </div>
                
            </div>
            <div class="modal-footer text-center border-0">
                <button type="submit" id="payNowButton" class="btn button-20" style="margin: 0 auto;">Pay Now</button>
            </div>
        </div>
    </div>
</div>
</form>

<div id="loadingOverlay">
    <div class="lds-grid">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

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

        // Call calculateTotalFare() after generating select pickers
        calculateTotalFare();
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
        const routeCell = document.getElementById("routeCell");
        const dateCell = document.getElementById("dateCell");
        const faretable = document.getElementById("fareTable");
        const numTickets = document.getElementById('numTickets');

        // Get references to the input fields in the modal
        const routeInput = document.getElementById("route");
        const dateTripInput = document.getElementById("dateTrip");
        const fareInput = document.getElementById("fare");
        const ticketInput = document.getElementById("ticket");

        // Add an event listener to the modal's show.bs.modal event
        const secondModal = document.getElementById("secondModal");
        secondModal.addEventListener("show.bs.modal", function () {
            // Set the value of the input fields in the modal
            routeInput.value = routeCell.innerText.trim();
            dateTripInput.value = dateCell.innerText.trim();
            ticketInput.value = numTickets.value; // Update this line
            const rawFare = fareTable.innerText.trim().replace("₱ ", "");
            const formattedFare = parseFloat(rawFare);
            fareInput.value = formattedFare;

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
    function checkAndShowModal() {
        // Check if both select pickers have a value selected
        if (originStation.value !== "Station" && destinationStation.value !== "Station") {
            // Check if the selected origin and destination are not the same
            if (originStation.value !== destinationStation.value) {
                // Check if a date is selected
                if (startDate.value) {
                    // Check if the fare in the table is not zero
                    if (parseFloat(fareTable.textContent) !== 0) {
                        // If all conditions are met, show the modal
                        $('#staticBackdrop').modal('show');
                    } else {
                        alert("Fare in the table must not be zero.");
                    }
                } else {
                    alert("Please select a date.");
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
    
    const redeemPointsCheckbox = document.getElementById("flexSwitchCheckDefault");
    if (redeemPointsCheckbox.checked) {
        const pointsToDeduct = <?php echo $points; ?>;
        totalFare -= pointsToDeduct;
    }

    // Display the overall total fare
    $("#total").val(totalFare.toFixed(2));
}

// Add an event listener to the passenger type select pickers
$(".passenger-type").on("change", function () {
    calculateTotalFare();
});

</script>


<script>
    document.getElementById('payNowButton').addEventListener('click', function () {
        document.getElementById('total').value = document.getElementById('total').value;
    });
</script>
<script>
        function updateTable() {
            var originStation = $("#originStation").val();
            var destinationStation = $("#destinationStation").val();
            var date = $("#startDate").val();

            // Get the fare and direction from the database based on the selected stations
            $.ajax({
                url: "get_fare.php",
                type: "POST",
                data: { 
                    origin: originStation, 
                    destination: destinationStation, 
                    date: date, 
                },
                dataType: "json",
                success: function (response) {
                    var fare = parseFloat(response.fare);
                    var direction = response.Direction;

                    if (!isNaN(fare)) {
                        // Update the table cells with selected values and calculated fare
                        $("#routeCell").text(originStation + " - " + destinationStation);
                        $("#dateCell").text(date);
                        $("#directionCell").text(direction);

                $("#fareTable").text("₱ " + fare.toFixed(2));
                calculateTotalFare();
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
</script>


<!-- Update this script to check for sufficient funds -->
<script>
    document.getElementById('payNowButton').addEventListener('click', function () {
        const totalInput = document.getElementById("total");
        const walletBalance = <?php echo $user_data['wallet']; ?>;

        // Check if the wallet balance is enough to cover the total fare
        if (parseFloat(totalInput.value) > walletBalance) {
            // Show alert
            alert("Insufficient balance. Please cash in to proceed");
        } else {
            // Show loading overlay
            document.getElementById('loadingOverlay').style.display = 'flex';

            // Delay the redirection to post_checkout.php
            setTimeout(function () {
                // Hide loading overlay
                document.getElementById('loadingOverlay').style.display = 'none';

                // Proceed to the second modal
                $('#secondModal').modal('show');
            }, 1900);
        }
    });

    // Add this script to prevent form submission when the alert is dismissed
    $('#payNowForm').submit(function (e) {
        const totalInput = document.getElementById("total");
        const walletBalance = <?php echo $user_data['wallet']; ?>;

        // Check if the wallet balance is enough to cover the total fare
        if (parseFloat(totalInput.value) > walletBalance) {
            // Prevent form submission
            e.preventDefault();
        }
    });
</script>

<script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let originalTotal = 0.0;
    let discountedTotal = 0.0;
    const switchCheckbox = document.getElementById("flexSwitchCheckDefault");
    const totalInput = document.getElementById("total");

    // Function to calculate the fare and update the totals
    function calculateFareAndUpdateTotals() {
        // Assuming calculateTotalFare() updates the total fare based on ticket details
        calculateTotalFare();
        originalTotal = parseFloat(totalInput.value);
        applyDiscounts(); // Apply any discounts to update discountedTotal
    }

    // Function to apply discounts (if any) and update the discounted total
    function applyDiscounts() {
        const points = <?php echo $points; ?>;
        // Example discount logic (modify as per your discount rules)
        discountedTotal = originalTotal - (originalTotal * 0.2); // Example: 20% discount
        if (switchCheckbox.checked) {
            discountedTotal = Math.max(discountedTotal - points, 0); // Deduct points, ensuring total doesn't go below 0
        }
    }

    // Function to update the total displayed to the user
    function updateDisplayedTotal() {
        totalInput.value = switchCheckbox.checked ? discountedTotal.toFixed(2) : originalTotal.toFixed(2);
    }

    // Event listener for changes in ticket details
    $(".passenger-type, #numTickets, #originStation, #destinationStation, #startDate").on("change", function() {
        calculateFareAndUpdateTotals();
        updateDisplayedTotal();
    });

    // Event listener for the points checkbox
    switchCheckbox.addEventListener("change", function() {
        applyDiscounts();
        updateDisplayedTotal();
    });

    // Initial calculation and display update
    calculateFareAndUpdateTotals();
    updateDisplayedTotal();
});
</script>

</script>

<script>
// Event listener for the redeem points checkbox
$("#flexSwitchCheckDefault").on("change", function () {
    calculateTotalFare();

    // Add AJAX to update points when the checkbox is checked
    if (this.checked) {
        const pointsToDeduct = <?php echo $points; ?>; // Modify this as needed
        $.ajax({
            url: "update_points.php",
            type: "POST",
            data: { pointsToDeduct: pointsToDeduct },
            success: function (response) {
                console.log("Points updated successfully");
            },
            error: function (error) {
                console.error("Error updating points: ", error);
            },
        });
    }
});
</script>


</body>
</html>

