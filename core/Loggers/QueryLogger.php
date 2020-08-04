<?php

namespace Velaa\Core\Loggers;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class QueryLogger
{
    /**
     * log.
     *
     * @return void
     */
    public static function log($query)
    {
        $logger = new Logger('sql queries');

        $logstream = new StreamHandler('stash'.DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'query.log', Logger::INFO);

        $logstream->setFormatter(new JsonFormatter());

        $logger->pushHandler($logstream);

        $logger->pushProcessor(function ($record) use ($query) {
            $record['context'] = $query;

            return $record;
        });

        $logger->info('Query Logged');

        return $logger;
    }
}
