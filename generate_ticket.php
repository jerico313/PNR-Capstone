<?php
// Include the QR code generation library
include('qrlib.php');

// Function to generate QR code
function generateQRCode($data, $ticketNumber)
{
    // Set the filename for the QR code image
    $filename = "qrcodes/ticket_$ticketNumber.png";

    // Generate QR code
    QRcode::png($data, $filename);

    // Return the filename for reference
    return $filename;
}

// Get the number of tickets from the form
$numTickets = isset($_POST['numTickets']) ? intval($_POST['numTickets']) : 0;

// Loop through each ticket to generate and download
for ($i = 1; $i <= $numTickets; $i++) {
    // Example data for the QR code (you can customize this based on your needs)
    $ticketData = "Ticket Number: $i\nRoute: Origin - Destination\nFare: ₱100.00";

    // Generate QR code for each ticket
    $qrCodeFilename = generateQRCode($ticketData, $i);

    // Download the generated ticket as a text file
    header("Content-Disposition: attachment; filename=ticket_$i.txt");
    header("Content-Type: application/octet-stream");
    readfile($qrCodeFilename);
    unlink($qrCodeFilename); // Delete the QR code image after downloading
}
?>
