<?php

namespace Velaa\Core\Utils;

class ResponseMaker
{
    /**
     * sendResponse.
     *
     * @param mixed $result
     * @param mixed $message
     *
     * @return void
     */
    public function sendResponse($result, $message)
    {
        return json_encode(ResponseUtil::makeResponse($message, $result));
    }

    /**
     * sendError.
     *
     * @param mixed $error
     * @param mixed $code
     *
     * @return void
     */
    public function sendError($error, $code = 404)
    {
        return json_encode(ResponseUtil::makeError($error), $code);
    }
}
