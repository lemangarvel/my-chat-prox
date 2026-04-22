<?php
$googleUrl = "https://google.com";
$url = $googleUrl . "?" . $_SERVER['QUERY_STRING'];
echo file_get_contents($url);
