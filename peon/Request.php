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
     * Get Request Variables
     *
     * @param  string  $key
     * @return array|string
     */
    public function get($key = null, $default = null)
    {
        if (is_null($key)) return $this->request;
        if (isset($this->request[$key])) return $this->request[$key];

        return $default;
    }


}