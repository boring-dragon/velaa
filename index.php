<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Velaa\Core\Router;
use Velaa\Core\Http\Request;

$request = new Request;

$router = new Router;
$router->load('routes/web.php')
        ->direct($request->uri(), $request->method());
