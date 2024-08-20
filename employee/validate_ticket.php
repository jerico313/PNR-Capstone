<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR Ticket Validator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d36de8f7e2.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Manrope" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
    *{
        font-family: Manrope;
    }
    .mainnav {
    font-weight: 600;
    background: rgb(0,180,216);
background: linear-gradient(50deg, rgba(0,180,216,1) 0%, rgba(23,71,147,1) 50%);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
}
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url("images/train3.jpg");
  background-color: #cccccc;
  background-position: center;
  background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }

    body::before {
  content: "";
  position: absolute;
  top: 0;
  z-index: -1; /* Move the pseudo-element to the background */
  left: 0;
  width: 100%;
  height: 100%;  
  background: rgba(0, 0, 0, 0.6); /* Adjust alpha value for darkness */
  background-attachment: fixed; /* Ensure the dark overlay doesn't move */
}

    main {
        width: 400px;
        height:520px;
        margin-top:35px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        border-radius: 15px;
        overflow: hidden;
        background: #FFF;
        border:none;
    }
    #reader {
        width: 400px;
        height: 500px; 
        border: none !important;
        font-size:12px;
        font-weight:600;
    }

    #reader__dashboard{
        border:none;
    }
    .result-container {
        margin-top:-12px;
        padding: 5px 20px;
        background: #FFC30B;
        z-index:1;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .result-header {
        margin: 0;
        padding: 20px 0;
        color: #333;
        font-size: 25px;
        text-align: left;
        padding-left: 20px;
    }
    #result {
        font-size: 1rem;
        color: #333;
    }
    .scan-btn {
    display: inline-block; /* Updated this line */
    width: 48%;
    padding: 10px;
    margin: 10px auto;
    background: #174793;
    color: white;
    text-align: center;
    border-radius: 5px;
    border:none;
    text-decoration: none;
}

 #html5-qrcode-button-camera-stop{
    display: inline-block; /* Updated this line */
    width: 40%;
    padding:5px;
    margin: 5px auto;
    background: #174793;
    color: white;
    font-size:15px;
    text-align: center;
    border-radius: 5px;
    border:none;
    text-decoration: none;
 } 

 #html5-qrcode-button-camera-start{
    display: inline-block; /* Updated this line */
    width: 40%;
    padding:5px;
    margin: 5px auto;
    background: #174793;
    color: white;
    text-align: center;
    border-radius: 5px;
    border:none;
    text-decoration: none;
 } 

 #bg {
    display: none;
    margin-top: 25px;
}

 @media (max-width: 768px) {
    #reader {
        width: 100%;
        height: 100%; 
        margin-top:28px;
    }
    
    .result-container{
        height:100%;
        padding: 10px 20px;
    }

    main{
        height:100%;
    }

    #bg{
        margin-top:80px; 
    }
      } 
</style>
</head>
<nav class="navbar navbar-expand-md navbar-light fixed-top mainnav">
  <div class="container-fluid">
  <a class="nav-link active"  style="color:#fff;font-size:20px;"  aria-current="page"  href="dashboard.php"><i class="fa-solid fa-arrow-left fa-lg"></i></a> 
    <div class="col-md-6">
      </div>
    </a>
    </div>
</nav>
<body>

<main>
<div id="bg">
<center>
    <img src="images/PNR.png" alt="pnr" width=150 height=150></div>
</center>
</div>


    <div id="reader"></div>
    <div class="result-container">
    <center>
    <i class="fa-solid fa-minus"></i><br>
    <i class="fa-solid fa-qrcode fa-xl" style="font-size:100px;padding-top:50px;"></i>
    </center>
        <div id="result" style="padding-bottom:70px;"></div>
    </div>
</main>

<script>
    let scanner;

    function startScanner() {
        scanner = new Html5QrcodeScanner('reader', { fps: 10, qrbox: 250 });
        scanner.render(success, error);
    }

    function updateResultContainer() {
    const resultContainer = document.querySelector('.result-container');
    const qrCodeIcon = resultContainer.querySelector('.fa-qrcode');

    // Check if there is a result
    const hasResult = document.getElementById('result').innerHTML.trim() !== '';

    // Hide or show the QR code icon based on the result
    if (hasResult) {
        qrCodeIcon.style.display = 'none';
    } else {
        qrCodeIcon.style.display = 'block';
    }
}

    function success(result) {
    // Send the scanned ticket number to the server using AJAX
    fetch('fetch_ticket_details.php?ticket_id=' + result)
        .then(response => response.json())
        .then(data => {
            document.getElementById('result').innerHTML = `
                <p class="result-header" style="text-align:center;font-weight:900;"><i class="fa-solid fa-train-subway"></i> Ticket Details</p>
                <div class="ticketno"><strong>Ticket No:</strong> ${data.ticket_id}</div>
                <div class="route"><strong>Route:</strong> ${data.route}</div>
                <div class="date"><strong>Date:</strong> ${data.date}</div>
                <div class="fare"><strong>Fare:</strong> ${data.fare}</div>
                <div class="status"><strong>Status:</strong> ${data.status}</div>
                <br>
                <center>
                <button class="scan-btn" id="useButton" onclick="markAsUsed('${data.ticket_id}')">Mark as Used</button>
                <button class="scan-btn" onclick="startScanner()">Scan New Ticket</button>
                </center>
            `;

            updateResultContainer();
            document.getElementById('bg').style.display = 'block';
            document.getElementById('reader').style.height = '25px'
            if (data.status) {
                // If status has a value, disable the "Mark as Used" button
                document.getElementById('useButton').disabled = true;
                document.getElementById('useButton').style.background = '#0f2b56';
                document.querySelector('.result-header').style.color = '#fff';
                document.querySelector('.ticketno').style.color = '#fff';
                document.querySelector('.route').style.color = '#fff';
                document.querySelector('.date').style.color = '#fff';
                document.querySelector('.fare').style.color = '#fff';
                document.querySelector('.status').style.color = '#fff';
                // Change the background color of the result-container to red
                document.querySelector('.result-container').style.background = '#c30000';
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById('result').innerHTML = 'Error fetching ticket details.';
        });

    scanner.clear();
}



function markAsUsed(ticketId) {
    fetch('update_ticket_status.php?ticket_id=' + ticketId)
        .then(response => response.text())
        .then(data => {
            startScanner(); // Restart scanner
        })
        .catch(err => {
            console.error(err);
            alert('Error updating ticket status.');
        });
}


function startScanner() {
    // Clear the previous results
    document.getElementById('result').innerHTML = '';

    // Reset the height of the reader to the original size
    document.getElementById('reader').style.height = '380px';
    document.querySelector('.result-container').style.background = '#FFC30B';

    const qrCodeIcon = document.querySelector('.result-container .fa-qrcode');
    qrCodeIcon.style.display = 'block';

    document.getElementById('bg').style.display = 'none';

    // Initialize the scanner
    scanner = new Html5QrcodeScanner('reader', { fps: 10, qrbox: 250 });
    scanner.render(success, error);
}



    function error(err) {
        console.error(err);
    }

    // Initiate the scanner on load
    startScanner();
    updateResultContainer();
</script>
</body>
</html>
