<?php

use Velaa\Core\Http\Route;


Route::get('/', function(){
    return view('home');
});