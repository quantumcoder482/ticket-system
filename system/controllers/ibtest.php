<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

if(!defined('APP_RUN')) exit('No direct access allowed');
// Do Not Remove this file
$data = array(
    'ibilling' => 'yes',
    'file_build' => $file_build
);
header('Content-type: application/json');
echo json_encode( $data ); 