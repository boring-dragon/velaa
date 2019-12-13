<?php namespace Velaa\Core\Interfaces;

interface IResponseUtil{

    /**
     * makeResponse
     *
     * @param  mixed $message
     * @param  mixed $data
     *
     * @return void
     */
    public static function makeResponse($message, $data);

    /**
     * makeError
     *
     * @param  mixed $message
     * @param  mixed $data
     *
     * @return void
     */
    public static function makeError($message, array $data = []);
}