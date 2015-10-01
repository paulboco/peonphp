<?php

class Router
{
    /**
     * All Registered Routes
     */
    protected $routes = array();

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
     * Class Constructor
     */
    public function __construct() {
        $this->parseUri();
    }

    /**
     * Register GET Routes
     */
    public function get($path, $controllerAction)
    {
        list($controller, $action) = $this->parseControllerAction($controllerAction);

        $this->registerRoute('GET', $path, $controller, $action);
    }

    /**
     * Dispatch The Route
     */
    public function dispatch()
    {
        // Include the controller class
        require(path() . "/http/controllers/{$this->controller}.php");

        // Call the controller method
        call_user_func_array(
            array(
                new $this->controller,
                $this->method
            ),
            array()
        );
    }

    /**
     * Parse The URI
     *
     * @return void
     */
    private function parseUri()
    {
        $parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        $parts = $this->checkForHomePage($parts);

        if (count($parts) < 2) {
            // you should throw a 404 here
            throw new Exception("Page Not Found", 1);
        }

        $this->controller = array_shift($parts);
        $this->method = array_shift($parts);

        if ( ! empty($parts)) {
            $this->params = $parts;
        }
    }

    /**
     * Check if the URI is to the home page.
     *
     * @param  array  $parts
     * @return boolean
     */
    private function checkForHomePage($parts)
    {
        if (count($parts) == 1 and $parts[0] === '') {
            return array(
                'Pages',
                'home',
            );
        }

        return $parts;
    }

    /**
     * Register A Route
     *
     * @param  string  $path
     * @param  string  $controllerAction
     * @return void
     */
    private function registerRoute($verb, $path, $controller, $action, $params = array())
    {
        $this->routes[] = array(
            'verb' => $verb,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'params' => $params,
        );
    }

    /**
     * Parse Controller Action
     */
    private function parseControllerAction($controllerAction)
    {
        return explode('@', $controllerAction);
    }

}
