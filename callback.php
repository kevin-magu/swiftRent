<?php
// Read raw JSON from Safaricom
$callbackJSON = file_get_contents('php://input');
file_put_contents('./callback.json', $callbackJSON . PHP_EOL, FILE_APPEND); // for testing

// Decode the JSON
$data = json_decode($callbackJSON, true);

// Check if it's a successful transaction
$callback = $data['Body']['stkCallback'];

if ($callback['ResultCode'] === 0) {
    $items = $callback['CallbackMetadata']['Item'];
    $details = [];

    foreach ($items as $item) {
        $details[$item['Name']] = $item['Value'] ?? null;
    }

    // Extract values
    $amount = $details['Amount'];
    $receipt = $details['MpesaReceiptNumber'];
    $phone = $details['PhoneNumber'];

    // For now, just log it (you'll insert into DB later)
    file_put_contents('successlog.txt', "PAID: $phone - KES $amount - $receipt\n", FILE_APPEND);
}
