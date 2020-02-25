<?php
/*
|--------------------------------------------------------------------------
| Velaa Router
|--------------------------------------------------------------------------
|
| Here You will register the routes for the application and map to the controller with
| method.
|
*/

$router->get('', '\App\Controllers\HomeController@index');


$router->get('posts','\App\Controllers\PostsController@getposts');
$router->post('posts/create', '\App\Controllers\PostsController@addPost');

$router->get('postsfactory', '\App\Controllers\PostsController@postFactory');

$router->get('stubtest', '\App\Controllers\PostsController@test');

$router->get('/test', function(){

    echo 'hello';
});