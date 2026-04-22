<?php
// Твой URL от Google (проверь, чтобы в конце не было лишних пробелов)
$googleUrl = "https://script.google.com/macros/s/AKfycbwGojJkYXpCh0JOjS1TspA4_1QapHnuXDDCIDnpGOC7aqbi3oStsAXVHwYFILlkKALw/exec";

// Собираем параметры
$params = $_SERVER['QUERY_STRING'];
$fullUrl = $googleUrl . (strpos($googleUrl, '?') === false ? '?' : '&') . $params;

// Настраиваем CURL (он намного мощнее и надежнее для таких задач)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fullUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Самое важное: разрешаем редиректы!
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
    echo $response; // Должно вывести "OK"
} else {
    echo "Error! Google Code: " + $httpCode;
}
