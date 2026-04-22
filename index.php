<?php
$googleUrl = "https://script.google.com/macros/s/AKfycbwGojJkYXpCh0JOjS1TspA4_1QapHnuXDDCIDnpGOC7aqbi3oStsAXVHwYFILlkKALw/exec";

if (empty($_GET)) {
    die("No data received. Add ?user=1&msg=2 to URL");
}

$url = $googleUrl . "?" . http_build_query($_GET);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($response) {
    echo $response;
} else {
    echo "CURL Error: " . $error;
}
