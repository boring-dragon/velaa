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
 * redirect
 *
 * @param  mixed $url
 * @param  mixed $code
 *
 * @return void
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}
