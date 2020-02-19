<?php

namespace App\Service;

use Velaa\Core\Container;
use App\Service\RequestService;
use Velaa\Core\Database\{QueryBuilder,Adapter,Sparrow};

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
        Container::bind('sparrow', new Sparrow());
        Container::bind('database', new QueryBuilder(Adapter::make()));
        Container::bind('collection', new \Velaa\Core\Utils\Collection());
    }
}
