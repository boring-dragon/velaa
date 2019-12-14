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


/**
 * json
 *
 * @param  mixed $data
 *
 * @return void
 */
function json($data)
{
    json_encode($data, JSON_PRETTY_PRINT);
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
