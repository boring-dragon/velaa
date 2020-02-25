<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Velaa\Core\{Router, Request};
\Velaa\Core\Loggers\AccessLogger::log();

$router = new \Bramus\Router\Router();
require 'routes/web.php';
$router->run();
