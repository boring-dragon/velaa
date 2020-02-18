<?php

namespace Velaa\Core\Interfaces;

interface IContainer
{
    /**
     * bind
     *
     * @param  mixed $key
     * @param  mixed $value
     *
     * @return void
     */
    public static function bind($key, $value);

    /**
     * get
     *
     * @param  mixed $key
     *
     * @return void
     */
    public static function get($key);
}
