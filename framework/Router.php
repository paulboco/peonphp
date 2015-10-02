<?php

class Router
{
    /**
     * The Controller
     */
    protected $controller;

    /**
     * The Controller's Method
     */
    protected $method;

    /**
     * The Route Parameters
     */
    protected $params;

    /**
     * The Current URI
     */
    protected $uri;


    /**
     * Class Constructor
     */
    public function __construct() {
        $this->prepareUri();
        $this->extractSegments();
    }

    /**
     * Dispatch The Route
     *
     * @return void
     */
    public function dispatch()
    {
        // Include the controller class
        require(path() . "/http/controllers/{$this->controller}.php");

        // Call the controller method
        call_user_func_array(array(
            new $this->controller,
            $this->method
        ), $this->params);
    }

    /**
     * Prepare the URI
     * 
     * @return void
     */
    private function prepareUri() 
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/') ?: 'page/home';
    }

    /**
     * Extract URI Segments to Class Properties
     *
     * @return void
     */
    private function extractSegments()
    {
        $segments = explode('/', $this->uri);
        
        $this->controller = $this->formatController(array_shift($segments));
        $this->method = $this->formatMethod(array_shift($segments));
        $this->params = empty($segments) ? array() : $segments;
    }

    /**
     * Format the Controller Segment
     *
     * @param  string  $controller
     * @return void
     */
    private function formatController($controller)
    {
        return ucfirst($controller) . 'Controller';
    }

    /**
     * Format the Controller Method Segment
     *
     * @param  string  $method
     * @return void
     */
    private function formatMethod($method)
    {
        $segments = array_map(function($segment) {
            return ucfirst($segment);
        }, explode('-', $method));

        return lcfirst(implode('', $segments));
    }

    /**
     * Send 404
     *
     * @return void
     */
    private function send404()
    {
        header('Page Not Found', true, 404);
        echo 'Page Not Found';
        exit();
    }


}
