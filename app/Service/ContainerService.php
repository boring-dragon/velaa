<?php

namespace App\Service;

use Baraveli\Container\Container;
use App\Service\RequestService;
use Velaa\Core\Database\Driver;

class ContainerService
{
    /**
     * dispatch
     *
     * @return void
     */
    public static function load()
    {
        Container::bind('request', RequestService::capture());
        
        Driver::dispatch();
    }
}
