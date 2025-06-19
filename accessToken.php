<?php
// Enable full error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🛡️ Best practice: move credentials outside web root for real projects
$consumerKey = '0apk2zPGydC2fFGKvAyxDICGYt9sPWUEGgrnnCr4PzHCOo02';
$consumerSecret = 'bhGsVfT4w5TlEE4o3fMvL6WC8QqXZf7LOi3uABuTjCiaY20Oa4fWkwpWN2EOGI3g';

// 🌐 Choose environment: 'sandbox' or 'production'
$environment = 'sandbox'; // Change to 'production' when going live

// Set appropriate token URL
$tokenUrl = ($environment === 'sandbox')
    ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
    : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

// 🔐 Encode credentials
$credentials = base64_encode("$consumerKey:$consumerSecret");

// 🌍 Make the API request
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $tokenUrl,
    CURLOPT_HTTPHEADER => [
        'Authorization: Basic ' . $credentials
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_SSL_VERIFYPEER => true,   // Important in production
    CURLOPT_SSL_VERIFYHOST => 2,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    // ❌ cURL-level error (e.g. timeout, DNS)
    echo "<h2 style='color:red;'>cURL Error</h2>";
    echo "<strong>Code:</strong> " . curl_errno($ch) . "<br>";
    echo "<strong>Message:</strong> " . curl_error($ch) . "<br>";
    echo "<pre>" . print_r(curl_getinfo($ch), true) . "</pre>";
} else {
    if ($httpCode === 200) {
        // ✅ Success
        $tokenData = json_decode($response, true);
        echo "<h2 style='color:green;'>Access Token Retrieved</h2>";
        echo "<pre>" . print_r($tokenData, true) . "</pre>";
    } else {
        // ❌ API-level error
        echo "<h2 style='color:red;'>API Error (HTTP $httpCode)</h2>";
        echo "<strong>Raw Response:</strong><br>";
        echo "<pre>" . htmlspecialchars($response) . "</pre>";
    }
}

curl_close($ch);

// 🧠 Debug server environment
echo "<hr><h3>Server Environment</h3><pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "cURL Enabled: " . (function_exists('curl_version') ? 'Yes' : 'No') . "\n";
if (function_exists('curl_version')) {
    print_r(curl_version());
}
echo "</pre>";
?>
