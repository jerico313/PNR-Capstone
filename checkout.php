<?php
session_start();

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'data' => [
            'attributes' => [
                'send_email_receipt' => false,
                'show_description' => true,
                'show_line_items' => true
            ]
        ]
    ]),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "accept: application/json",
        "authorization: Basic c2tfdGVzdF85ZzhQRlE5U1RVYVBXMWVGalF3dGJzbWs6"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // Decode the response to extract the total value
    $responseData = json_decode($response, true);

    $total = findTotalAmount($responseData);

    if ($total !== null) {
        // Store the total value in a session variable
        $_SESSION['checkout_total'] = $total;

        echo $response;
    } else {
        echo "Error: Total amount not found in the API response.";
    }
}

function findTotalAmount($data) {
    if (isset($data['data']['attributes']['total'])) {
        return $data['data']['attributes']['total'];
    }

    if (isset($data['meta']['price']['total'])) {
        return $data['meta']['price']['total'];
    }

    return null;
}
?>
