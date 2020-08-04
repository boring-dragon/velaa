<?php

/**
 * view.
 *
 * @param mixed $name
 * @param mixed $data
 *
 * @return void
 */
function view($name, $data = [])
{
    extract($data);
    require "views/{$name}.view.php";
}

/*

Responses
*/

/**
 * jsonify.
 *
 * @param mixed $data
 * @param mixed $message
 *
 * jsonify the response
 *
 * @return void
 */
function jsonify($data, $message = 'received successfully!')
{
    $response = new \Velaa\Core\Http\Response();
    $response->headers->set('Content-Type', 'application/json');
    $responsemaker = new \Velaa\Core\Utils\ResponseMaker();
    $response->setContent($responsemaker->sendResponse($data, $message));
    $response->send();
}

/**
 * sendJson.
 *
 *  send json as response
 *
 * @param mixed $data
 *
 * @return void
 */
function sendJson($data)
{
    $response = new \Velaa\Core\Http\Response();
    $response->headers->set('Content-Type', 'application/json');
    $response->setContent(json_encode($data));
    $response->send();
}

/**
 * jsonifyError.
 *
 *  TODO: intergrate symfony response
 *
 * @param mixed $error_message
 * @param mixed $code
 *
 * jsonify with an error
 *
 * @return void
 */
function jsonifyError($error_message, $code)
{
    $response = new \Velaa\Core\Utils\ResponseMaker();
    echo $response->sendError($error_message, $code);
}

/**
 * toXML.
 *
 * @param mixed $array
 *
 *  Response with xml
 *
 * @return void
 */
function toXML($array)
{
    $raw = json_encode($array);
    $data = json_decode($raw, true);
    $response = new \Velaa\Core\Http\Response();
    $response->headers->set('Content-Type', 'application/xml');
    $responsemaker = \Spatie\ArrayToXml\ArrayToXml::convert($data);
    $response->setContent($responsemaker);
    $response->send();
}

/**
 * toYAML.
 *
 * @param mixed $array
 *
 * Response with YAML
 *
 * @return void
 */
function toYAML($array)
{
    $raw = json_encode($array);
    $data = json_decode($raw, true);
    $response = new \Velaa\Core\Http\Response();
    $response->headers->set('Content-Type', 'text/yaml');
    $responsemaker = \Symfony\Component\Yaml\Yaml::dump($data);
    $response->setContent($responsemaker);
    $response->send();
}

/**
 * Redirect to a new page.
 *
 * @param string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

//get memory usage of script
function mem_usage()
{
    /* Currently used memory */
    $mem_usage = memory_get_usage();

    //memory use in kb
    return round($mem_usage / 1024);
}

/*

Directory accessors
*/

// app root path
function base_path($path = '')
{
    return getcwd();
}

// Public path
function public_path($path = '')
{
    return base_path().'public'.DIRECTORY_SEPARATOR;
}

// stash path
function stash_path($path = '')
{
    return base_path().DIRECTORY_SEPARATOR.'stash'.DIRECTORY_SEPARATOR;
}

//log path
function log_path($path = '')
{
    return stash_path().'logs'.DIRECTORY_SEPARATOR;
}
