<?php

namespace Velaa\Core\Utils;

/**
 * The Collection class allows you to access a set of data
 * using both array and object notation.
 */
class Collection implements \Iterator, \Countable
{
    /**
     * Collection data.
     *
     * @var array
     */
    private $data;

    /**
     * __toString
     *
     * Jsonify the collection automatically when the trying to output as a string.
     * 
     * @return void
     */
    public function __toString()
    {
        return $this->jsonify();
    }

    /**
     * Constructor.
     *
     * @param array $data Initial data
     */
    public function __construct(array $data = array())
    {
        $this->data = $data;
    }

    /**
     * Gets an item.
     *
     * @param string $key Key
     * @return mixed Value
     */
    public function __get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Set an item.
     *
     * @param string $key Key
     * @param mixed $value Value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Checks if an item exists.
     *
     * @param string $key Key
     * @return bool Item status
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Removes an item.
     *
     * @param string $key Key
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }


    /**
     * Resets the collection.
     */
    public function rewind()
    {
        reset($this->data);
    }
 
    /**
     * Gets current collection item.
     *
     * @return mixed Value
     */
    public function current()
    {
        return current($this->data);
    }
 
    /**
     * Gets current collection key.
     *
     * @return mixed Value
     */
    public function key()
    {
        return key($this->data);
    }
 
    /**
     * Gets the next collection value.
     *
     * @return mixed Value
     */
    public function next()
    {
        return next($this->data);
    }
 
    /**
     * Checks if the current collection key is valid.
     *
     * @return bool Key status
     */
    public function valid()
    {
        $key = key($this->data);
        return ($key !== null && $key !== false);
    }

    /**
     * Gets the size of the collection.
     *
     * @return int Collection size
     */
    public function count()
    {
        return sizeof($this->data);
    }

    /**
     * Gets the item keys.
     *
     * @return array Collection keys
     */
    public function keys()
    {
        return array_keys($this->data);
    }

    /**
     * Gets the collection data.
     *
     * @return array Collection data
     */
    public function get()
    {
        return $this->data;
    }

    /**
     * Sets the collection data.
     *
     * @param array $data New collection data
     */
    public function set(array $data)
    {
        $this->data = $data;
    }

    /**
     * Removes all items from the collection.
     */
    public function clear()
    {
        $this->data = array();
    }

    /**
     *   convert the collection to json
     *
     * @return void
     */
    public function jsonify()
    {
        return json_encode($this->data);
    }

    /**
     * first
     * 
     *  Return the first item of the collection
     *
     * @return void
     */
    public function first()
    {
        return $this->data[0];
    }

    /**
     * second
     * 
     *  Return the second item from the colelction
     *
     * @return void
     */
    public function second()
    {
        return $this->data[1];
    }

    public function latest()
    {
        return end($this->data);
    }
}
