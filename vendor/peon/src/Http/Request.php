<?php

namespace Peon\Http;

class Request
{
    /**
     * Get A Request Variable
     *
     * @param  string  $key
     * @param  string  $default
     * @return array|string
     */
    public function get($key = null, $default = null)
    {
        if (is_null($key)) {
            return $_REQUEST;
        }

        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }

        return $default;
    }

    /**
     * Get All Request Variables
     *
     * @return array|null
     */
    public function all()
    {
        return $this->get();
    }

    /**
     * Check If A Request Variable Exists
     *
     * @param  string  $key
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($key, $_REQUEST);
    }
}
