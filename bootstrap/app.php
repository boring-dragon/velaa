<?php
/*
|--------------------------------------------------------------------------
| Application bootsrap file
|--------------------------------------------------------------------------
|
| Bootstrap file that loads components before the framework starts
|
*/

require 'helpers.php';

use App\Service\ContainerService;

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$dotenv = \Dotenv\Dotenv::create(__DIR__, '../.env');
$dotenv->load();

ContainerService::load();
