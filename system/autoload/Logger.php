<?php
use Monolog\Logger as MLogger;
use Monolog\Handler\StreamHandler;

class Logger {

    public static function write($message)
    {
        $logger = new MLogger('clx');
// Now add some handlers
        $logger->pushHandler(new StreamHandler('storage/logs/clx.log', MLogger::DEBUG));
        $logger->info($message);
    }

}