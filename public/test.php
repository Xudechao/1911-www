<?php
$url = 'http://api.1911.com/test.php';
$response = file_get_contents($url);
echo $response;
