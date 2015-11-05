<?php

namespace Peon;

class Request
{
    /**
     * The HTTP Request
     *
     * @var array
     */
    protected $request;

    /**
     * Create a new request controller
     */
    public function __construct()
    {
        $this->request = $_REQUEST;
    }

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
            return $this->request;
        }

        if (isset($this->request[$key])) {
            return $this->request[$key];
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
        return array_key_exists($key, $this->request);
    }
}
