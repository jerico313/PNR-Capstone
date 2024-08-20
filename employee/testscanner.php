<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Scanner</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">QR Code Scanner</h1>
    <div id="qr-reader" style="width:500px"></div>
    <div id="qr-reader-results"></div>
    <div id="result-message" class="mt-4"></div>
</div><script>
    function onScanSuccess(decodedText, decodedResult) {
        // Log the decoded text or result
        console.log(`Decoded text: ${decodedText}`, decodedResult);

        // Display the success message and QR code content
        const resultMessage = document.getElementById('qr-reader-results');
        const isUrl = isValidHttpUrl(decodedText);
        resultMessage.innerHTML = `
            <div class="alert alert-success" role="alert">
                Success! The QR code content is: 
                ${isUrl 
                    ? `<a href="${decodedText}" target="_blank" rel="noopener noreferrer">Open Scanned Link</a>
                    <br><a href="testscanner.php">Scan Again</a>`
                    : `<strong>${decodedText}</strong>`
                }
            </div>
        `;

        // If you want to scan again, uncomment the next line
        html5QrcodeScanner.clear();
    }

    function isValidHttpUrl(string) {
        let url;
        
        try {
            url = new URL(string);
        } catch (_) {
            return false;  
        }

        return url.protocol === "http:" || url.protocol === "https:";
    }

    var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", { fps: 10, qrbox: 250 });


    // Optionally, provide a failure callback
    function onScanFailure(error) {
        // Handle scan failure, show a message or log the error
        console.error(`Scan failure: ${error}`);
    }
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>



</body>
</html>
