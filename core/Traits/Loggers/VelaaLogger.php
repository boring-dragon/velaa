<?php

namespace Velaa\Core\Traits\Loggers;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

trait VelaaLogger
{
    /**
     * logger.
     *
     * @param mixed $channel
     * @param mixed $message
     *
     * @return void
     */
    public function logger(string $channel = 'default.log', $message)
    {
        $logger = new Logger($channel);

        $logstream = new StreamHandler('stash/logs/'.$channel.'.log', Logger::INFO);

        $logstream->setFormatter(new JsonFormatter());

        $logger->pushHandler($logstream);

        $logger->info($message);

        return $logger;
    }
}
