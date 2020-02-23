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

error_reporting(E_ALL);
$whoops = new \Whoops\Run;
$debug = true;
if ($debug) {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    assert_options(ASSERT_ACTIVE, true);
} else {
    $whoops->pushHandler(function($e){
        \Velaa\Core\Templates\ErrorRender::render($e);
    });
}
$whoops->register();

$dotenv = \Dotenv\Dotenv::create(base_path());
$dotenv->load();

ContainerService::load();
