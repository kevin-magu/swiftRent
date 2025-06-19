<?php
$consumerKey = '0apk2zPGydC2fFGKvAyxDICGYt9sPWUEGgrnnCr4PzHCOo02'; // replace with your key
$consumerSecret = 'bhGsVfT4w5TlEE4o3fMvL6WC8QqXZf7LOi3uABuTjCiaY20Oa4fWkwpWN2EOGI3g'; // replace with your secret

$credentials = base64_encode($consumerKey . ':' . $consumerSecret);

$ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic ' . $credentials
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$token = json_decode($response);
echo "<pre>";
print_r($token);
