<?php
$googleUrl = "https://script.google.com/macros/s/AKfycbwGojJkYXpCh0JOjS1TspA4_1QapHnuXDDCIDnpGOC7aqbi3oStsAXVHwYFILlkKALw/exec";
$url = $googleUrl . "?" . $_SERVER['QUERY_STRING'];
echo file_get_contents($url);
