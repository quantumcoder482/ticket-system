<?php

if (!defined('APP_RUN')) exit('No direct access allowed');



return [
    'development' => [
        'type' => 'mysql',
        'host' => DB_HOST,
        'port' => DB_PORT,
        'user' => DB_USER,
        'pass' => DB_PASSWORD,
        'database' => DB_NAME,
        'singleTransaction' => false
    ]
];