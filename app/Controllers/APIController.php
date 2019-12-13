<?php

namespace App\Controllers;

use Velaa\Core\Utils\ResponseUtil;

class APIController
{

    /**
     * sendResponse
     *
     * @param  mixed $result
     * @param  mixed $message
     *
     * @return void
     */
    public function sendResponse($result, $message)
    {
        return json(ResponseUtil::makeResponse($message, $result));
    }

    /**
     * sendError
     *
     * @param  mixed $error
     * @param  mixed $code
     *
     * @return void
     */
    public function sendError($error, $code = 404)
    {
        return json(ResponseUtil::makeError($error), $code);
    }
}
