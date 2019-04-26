<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

http_response_code(200);
header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: Authorization");

$headers = apache_request_headers();
$r = array();
if(!isset($headers['Authorization'])){
    $r['message'] = 'No';
    echo json_encode($r);
    exit;
}

$token = $headers['Authorization'];


$r['message'] = 'yes';

echo json_encode($r);

