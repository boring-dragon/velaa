<?php

namespace App\Service;

use Velaa\Core\Container;
use Velaa\Core\Database\Adapters\MysqlAdapter;
use Velaa\Core\Database\QueryBuilder;

class ContainerService
{
    /**
     * load.
     *
     * @return void
     */
    public static function load()
    {
        Container::bind('request', RequestService::capture());
        Container::bind('database', new QueryBuilder(MysqlAdapter::make()));
        Container::bind('collection', new \Velaa\Core\Utils\Collection());
        Container::bind('validator', new  \Velaa\Core\Http\Validator());
        Container::bind('faker', \Faker\Factory::create());
    }
}
