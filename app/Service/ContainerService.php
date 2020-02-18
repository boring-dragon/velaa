<?php

namespace App\Service;

use Velaa\Core\Container;
use App\Service\RequestService;

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
    }
}
