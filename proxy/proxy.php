<?php
$target_url = 'http://pcsberkeley.org' . $_SERVER['REQUEST_URI'];

$ch = curl_init($target_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

header('Content-Type: ' . get_headers($target_url, 1)['Content-Type']);
http_response_code($httpcode);

echo $response;
