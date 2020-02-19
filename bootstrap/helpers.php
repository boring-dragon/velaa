<?php

/**
 * view
 *
 * @param  mixed $name
 * @param  mixed $data
 *
 * @return void
 */
function view($name, $data = [])
{
    extract($data);
    require "views/{$name}.view.php";
}

function jsonify($data, $message)
{
    $response = new \Velaa\Core\Utils\ResponseMaker;
    echo $response->sendResponse($data, $message);
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}
