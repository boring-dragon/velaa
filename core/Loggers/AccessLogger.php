<?php

namespace Velaa\Core\Loggers;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class AccessLogger
{
    /**
     * log.
     *
     * @return void
     */
    public static function log()
    {
        $logger = new Logger('access');

        $logstream = new StreamHandler('stash'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'access.log', Logger::INFO);

        $logstream->setFormatter(new JsonFormatter());

        $logger->pushHandler($logstream);

        $logger->pushProcessor(function ($record) {
            if (!array_key_exists('PATH_INFO', $_SERVER)) {
                $path = '';
            } else {
                $path = $_SERVER['PATH_INFO'];
            }
            $record['info'] = ['user_ip' => $_SERVER['REMOTE_ADDR'],
                'method'                 => $_SERVER['REQUEST_METHOD'],
                'path'                   => $path,
                'user-agent'             => $_SERVER['HTTP_USER_AGENT'], ];

            return $record;
        });
        $logger->info('Application access logged');
    }
}
