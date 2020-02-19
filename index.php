<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Velaa\Core\Router;
use Velaa\Core\Request;

Router::load('routes/web.php')

->direct(Request::uri(), Request::method());
