<?php
/*
|--------------------------------------------------------------------------
| Route File
|--------------------------------------------------------------------------
|
| Here You will register the routes for the application and map to the controller with
| method.
| Broken need a fix
|
*/

$router->get('', 'HomeController@index');
$router->get('posts/create', 'HomeController@addPost');

$router->get('posts','HomeController@getposts');