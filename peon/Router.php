<?php

namespace Peon;

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
     * @todo   This method is bloated and needs to be broken up
     * @return void
     */
    public function dispatch()
    {
        $controllerClass = "App\\Http\\Controllers\\{$this->controller}";

        // Send a 404 if the controller or method doesn't exist
        if ( ! class_exists($controllerClass)) {
            $this->send404();
        }

        if ( ! method_exists($controllerClass, $this->method)) {
            $this->send404();
        }

        // Call the controller method if it exists
        call_user_func_array(array(
            new $controllerClass,
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
        view('/views/errors/404.tpl');
        exit();
    }


}
