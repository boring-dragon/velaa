<?php
require 'helpers.php';

use App\Service\ContainerService;
use Velaa\Core\Http\Route;

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$dotenv = \Dotenv\Dotenv::create(__DIR__, '../.env');
$dotenv->load();

ContainerService::load();

$builder = new \DI\ContainerBuilder();
$container = $builder
    ->useAutowiring(true)
    ->ignorePhpDocErrors(true)
    ->build();

Route::enableDependencyInjection($container);
