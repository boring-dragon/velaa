<?php

namespace Velaa\Core;

use Velaa\Core\Interfaces\IContainer;

class Container implements IContainer
{
    protected static $registry = [];

    /**
     * bind.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * get.
     *
     * @param mixed $key
     *
     * @return void
     */
    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new \Exception("No {$key} is bound in a container.");
        }

        return static::$registry[$key];
    }
}
