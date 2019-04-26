#!/usr/local/bin/php
<?php

require '../vendor/autoload.php';
require 'config.php';

$fd = fopen('php://stdin', 'r');


$input = '';
while (!feof($fd)) {
    $input .= fread($fd, 1024);
}
fclose($fd);
$mailParser = new \ZBateson\MailMimeParser\MailMimeParser();

$body = $message->getTextContent();

if (!$body) {
    $body = $message->getHtmlContent();
}

$body = trim($body);

if (!$body) {
    $body = 'No message found.';
}

$subject   = $message->getHeaderValue('subject');
$fromemail = $message->getHeaderValue('from');
$fromname  = '';

if ($fromHeader = $message->getHeader('from')) {
    $fromname = $fromHeader->getPersonName();
}

if (empty($fromname)) {
    $fromname = $fromemail;
}

if ($reply_to = $message->getHeaderValue('reply-to')) {
    $fromemail = $reply_to;
}


if (mb_substr_count($subject, 'FWD:') == 0 && mb_substr_count($subject, 'FW:') == 0) {
    $parsedBody = \EmailReplyParser\EmailReplyParser::parseReply($body);

    $parsedBody = trim($parsedBody);
    // For some emails this is causing an issue and not returning the email, instead is returning empty string
    // In this case, only use parsed email reply if not empty
    if (!empty($parsedBody)) {
        $body = $parsedBody;
    }
}

$body = trim($body);
$body = str_replace('&nbsp;', ' ', $body);

// Remove duplicate new lines
$body = preg_replace("/[\r\n]+/", "\n", $body);
// new lines with <br />
$body = preg_replace('/\n(\s*\n)+/', '<br />', $body);
$body = preg_replace('/\n/', '<br />', $body);

$db = new DB;

$db->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$db->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$db->bootEloquent();

// check email already exist



