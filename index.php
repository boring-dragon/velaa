<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Velaa\Core\Http\Route;

Route::setDefaultNamespace('\App\Controllers');
require_once 'routes/web.php';

Route::start();
