<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Velaa\Core\{Router, Request};
\Velaa\Core\Loggers\AccessLogger::log();
Router::load('routes/web.php')
->direct(Request::uri(), Request::method());
