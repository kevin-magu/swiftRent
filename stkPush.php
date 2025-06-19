<?php
header('Content-Type: application/json');

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST allowed']);
    exit;
}

// Read raw JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
$phone = isset($data['phone']) ? preg_replace('/\D/', '', $data['phone']) : null;
$amount = isset($data['amount']) ? intval($data['amount']) : 0;

if (!$phone || !preg_match('/^2547[0-9]{8}$/', $phone)) {
    echo json_encode(['success' => false, 'message' => 'Invalid phone number']);
    exit;
}

if ($amount < 1) {
    echo json_encode(['success' => false, 'message' => 'Invalid amount']);
    exit;
}

// 🔐 Daraja Credentials (Sandbox)
$consumerKey = '0apk2zPGydC2fFGKvAyxDICGYt9sPWUEGgrnnCr4PzHCOo02';
$consumerSecret = 'bhGsVfT4w5TlEE4o3fMvL6WC8QqXZf7LOi3uABuTjCiaY20Oa4fWkwpWN2EOGI3g';
$shortCode = '174379'; // Use Paybill or Till number
$passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'; // Found in Daraja portal

// 🔑 Step 1: Get access token
$credentials = base64_encode("$consumerKey:$consumerSecret");

$tokenUrl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$ch = curl_init($tokenUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic $credentials"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$tokenData = json_decode($response);
if (!isset($tokenData->access_token)) {
    echo json_encode(['success' => false, 'message' => 'Failed to get access token']);
    exit;
}

$accessToken = $tokenData->access_token;

// 🧠 Step 2: Build STK push request
$timestamp = date('YmdHis');
$password = base64_encode($shortCode . $passkey . $timestamp);

$stkUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackUrl = 'https://tri-sparkaviation.com/mpesa/callback.php'; // Replace with your callback URL

$postData = [
    'BusinessShortCode' => $shortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $phone,
    'PartyB' => $shortCode,
    'PhoneNumber' => $phone,
    'CallBackURL' => $callbackUrl,
    'AccountReference' => 'RentPayment',
    'TransactionDesc' => 'Rent payment via M-Pesa'
];

// 🛰️ Step 3: Send STK Push
$ch = curl_init($stkUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $accessToken",
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response);

if (isset($result->ResponseCode) && $result->ResponseCode == '0') {
    echo json_encode(['success' => true, 'message' => 'STK Push sent']);
} else {
    echo json_encode(['success' => false, 'message' => $result->errorMessage ?? 'STK Push failed']);
}
?>
