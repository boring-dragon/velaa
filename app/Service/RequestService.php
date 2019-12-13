<?php
namespace App\Service;

use Velaa\Core\Http\Request;
class RequestService
{

    public static function capture()
    {
        $request = Request::createFromGlobals();

        return $request;
    }
    
}