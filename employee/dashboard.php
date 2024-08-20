<?php 
require_once('header.php'); 
require_once('sidenav.php'); 
?>

<?php

include("../admin/inc/config.php");


// Fetch the total number of accounts from the database
$query = "SELECT COUNT(*) as totalAccounts FROM accounts";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalAccounts = $row['totalAccounts'];
} else {
    die("Error in the query: " . mysqli_error($conn));
}

$queryEmployee = "SELECT COUNT(*) as totalEmployeeAccounts FROM employees";
$resultEmployee = mysqli_query($conn, $queryEmployee);

// Check if the query was successful
if ($resultEmployee) {
    $rowEmployee = mysqli_fetch_assoc($resultEmployee);
    $totalEmployeeAccounts = $rowEmployee['totalEmployeeAccounts'];
} else {
    die("Error in the employee query: " . mysqli_error($conn));
}

$queryTrains = "SELECT COUNT(*) as totalTrains FROM trains";
$resultTrains = mysqli_query($conn, $queryTrains);

// Check if the query was successful
if ($resultTrains) {
    $rowTrains = mysqli_fetch_assoc($resultTrains);
    $totalTrains = $rowTrains['totalTrains'];
} else {
    die("Error in the trains query: " . mysqli_error($conn));
}

$querySales = "SELECT DATE_FORMAT(date, '%Y-%m') as month, SUM(CASE WHEN status='payment' THEN amount ELSE 0 END) as totalAmount FROM transactions GROUP BY month";
$resultSales = mysqli_query($conn, $querySales);

// Check if the query was successful
if (!$resultSales) {
    die("Error in the sales query: " . mysqli_error($conn));
}

// Fetch data for the line graph
$months = [];
$salesData = [];

while ($rowSales = mysqli_fetch_assoc($resultSales)) {
    $months[] = $rowSales['month'];
    $salesData[] = $rowSales['totalAmount'];
}



// Close the database conn
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<header>
<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
      <script src="https://kit.fontawesome.com/d36de8f7e2.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Archivo Black" rel="stylesheet">
      
    <style>
        .dash {
    height: 40px;
    display: flex;
    align-items: center;
    height: auto;
    box-shadow: none;
    }
    .content {
    margin-left: 250px !important;
    margin-top: 5px !important;
    padding:10px !important;
    }

    .acc{
        box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
-webkit-box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
    }
    .graph {
            margin-top: 20px;
        }
    #salesChart, #startDate{
        box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
-webkit-box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
-moz-box-shadow: 0px 1px 8px 0px rgba(0,0,0,0.19);
    }

    </style>
</header>
<body>
<div class="das" style="padding-left:76.95vw;padding-top:120px;">
<div class="sales" style="width:19.90vw;">
  <input id="startDate" class="form-control" type="date" style="width: 100%" data-dropup-auto="false" value="<?php echo date('Y-m-d'); ?>" />
</div>
</div>
<div class="content" style="margin-bottom:10px;">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="dash">
                    <div class="container-fluid">
                        <div class="row" >
                        <br>
                            <div class="col-lg-4">
                                <div class="acc" style="font-weight:900;border-radius:5px;background-color:#fff;border-top:5px solid #174793;width:24.50vw;height:28vh;text-align:center">
                                <p style="padding:2vh 0 0 0;font-size:15px;">Registered Passenger</p>
                                <p style="font-size:50px;font-family:Archivo Black;"><?php echo $totalAccounts; ?></p>
                                
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="acc" style="font-weight:900;border-radius:5px;background-color:#fff;border-top:5px solid #0077B6;width:24.50vw;height:28vh;text-align:center">
                                <p style="padding:10px 0 0 0;font-size:15px;">Registered Employee</p>
                                <p style="font-size:50px;font-family:Archivo Black;"><?php echo $totalEmployeeAccounts; ?></p>
                            
                                </div>
                            </div>
                            <div class="col-lg-4">
                                    <div class="acc" style="font-weight:900;border-radius:5px;background-color:#fff;border-top:5px solid #00B4D8;width:24.50vw;height:28vh;text-align:center">
                                    <p style="padding:10px 0 0 0;font-size:15px;">Trains</p>
                                    <p style="font-size:50px;font-family:Archivo Black;"><?php echo $totalTrains; ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="sales" style="padding-left:280px;width:209vh;margin-bottom:15px;">
      <p style="font-size:35px;font-weight:900;">Tickets Sold</p>
      <div class="acc" style="font-weight:900;border-radius:5px;background-color:#fff;border-left:5px solid #174793;width:100%;height:28vh;text-align:center">
            <p style="padding:20px 0 0 0;font-size:15px;">Payments</p>
            <p id="totalAmount" style="font-size:50px;font-family:Archivo Black;"><?php echo $totalAmount; ?></p>
        </div>
      </div>
      <div class="content">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="dash">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Alabang</p>
                                <p id="alabang" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#0077B6;border:1px solid #0077B6;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Sucat</p>
                                <p id="sucat" style="font-size:15px;text-align:center;">0</p>    
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Bicutan</p>
                                <p id="bicutan" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">FTI</p>
                                <p id="fti" style="font-size:15px;text-align:center;">0</p>    
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#0077B6;border:1px solid #0077B6;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Nichols</p>
                                <p id="nichols" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">EDSA</p>
                                <p id="edsa" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>     
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#0077B6;border:1px solid #0077B6;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Pasay Road</p>
                                <p id="pasayroad" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Buendia</p>   
                                <p id="buendia" style="font-size:15px;text-align:center;">0</p>  
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Vito Cruz</p>
                                <p id="vitocruz" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#0077B6;border:1px solid #0077B6;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">San Andres</p> 
                                <p id="sanandres" style="font-size:15px;text-align:center;">0</p>   
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Paco</p>
                                <p id="paco" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Pandacan</p>
                                <p id="pandacan" style="font-size:15px;text-align:center;">0</p>
                            </div>
                            </div>     
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Santa Mesa</p> 
                                <p id="santamesa" style="font-size:15px;text-align:center;"></p>   
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">España</p>
                                <p id="españa" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#0077B6;border:1px solid #0077B6;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Laon Laan</p>
                                <p id="laonlaan" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                            <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#00B4D8;border:1px solid #00B4D8;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Bluementritt</p>
                                <p id="bluementritt" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="acc" style="font-weight:900;color:#fff;border-radius:15px;background-color:#174793;border:1px solid #174793;width:12vw;height:15.12vh;">
                                <p style="padding:10px 0 0 10px;font-size:13px;">Tutuban</p>
                                <p id="tutuban" style="font-size:15px;text-align:center;">0</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="graph" style="padding:0 20px 20px 280px;">
    <canvas id="salesChart" width="500" height="250" style="background-color:#FFF;border-radius:10px;"></canvas>
    </div>
    <script>
    document.getElementById('alabang').innerText = <?php echo $stationCounts['alabang']; ?>;
    document.getElementById('sucat').innerText = <?php echo $stationCounts['sucat']; ?>;
    document.getElementById('bicutan').innerText = <?php echo $stationCounts['bicutan']; ?>;
    document.getElementById('fti').innerText = <?php echo $stationCounts['fti']; ?>;
    document.getElementById('nichols').innerText = <?php echo $stationCounts['nichols']; ?>;
    document.getElementById('edsa').innerText = <?php echo $stationCounts['edsa']; ?>;
    document.getElementById('pasayroad').innerText = <?php echo $stationCounts['pasayroad']; ?>;
    document.getElementById('buendia').innerText = <?php echo $stationCounts['buendia']; ?>;
    document.getElementById('vitocruz').innerText = <?php echo $stationCounts['vitocruz']; ?>;
    document.getElementById('sanandres').innerText = <?php echo $stationCounts['sanandres']; ?>;
    document.getElementById('paco').innerText = <?php echo $stationCounts['paco']; ?>;
    document.getElementById('pandacan').innerText = <?php echo $stationCounts['pandacan']; ?>;
    document.getElementById('santamesa').innerText = <?php echo $stationCounts['santamesa']; ?>;
    document.getElementById('españa').innerText = <?php echo $stationCounts['españa']; ?>;
    document.getElementById('laonlaan').innerText = <?php echo $stationCounts['laonlaan']; ?>;
    document.getElementById('bluementritt').innerText = <?php echo $stationCounts['bluementritt']; ?>;
    document.getElementById('tutuban').innerText = <?php echo $stationCounts['tutuban']; ?>;
</script>
<script>
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Sales per Month',
                data: <?php echo json_encode($salesData); ?>,
                backgroundColor: '#174793',
                borderRadius: 10, 
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    labels: <?php echo json_encode($months); ?>
                },
                y: {
                    type: 'linear',
                    position: 'left'
                }
            }
        }
    });
</script>

<!-- Add this script inside the <head> tag of your HTML document -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Function to update ticket counts based on the selected date
    function updateTicketCounts() {
      var selectedDate = document.getElementById('startDate').value;

      // Make an AJAX request to fetch updated ticket counts
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var ticketCounts = JSON.parse(xhr.responseText);

          // Update the ticket counts on the page
          Object.keys(ticketCounts).forEach(function (station) {
            document.getElementById(station).innerText = ticketCounts[station];
          });
        }
      };
      xhr.open('GET', 'get_ticket_counts.php?date=' + selectedDate, true);
      xhr.send();
    }

    // Attach an event listener to the date input
    document.getElementById('startDate').addEventListener('change', function () {
      // Update ticket counts when the date changes
      updateTicketCounts();
    });

    // Initial update based on the default selected date
    updateTicketCounts();
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    function updateTotalAmount() {
    var selectedDate = document.getElementById('startDate').value;

    // Make an AJAX request to fetch updated total amount
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            var totalAmount = response.totalAmount;

            // Update the total amount on the page
            document.getElementById('totalAmount').innerText = 'PHP ' + (totalAmount !== null ? totalAmount : '0.00');
        }
    };
    xhr.open('GET', 'get_transaction_amount.php?date=' + selectedDate, true);
    xhr.send();
}

// Attach an event listener to the date input
document.getElementById('startDate').addEventListener('change', function () {
    // Update total amount when the date changes
    updateTotalAmount();
});

// Initial update based on the default selected date
updateTotalAmount();
  });
</script>
    </body>
</html>

