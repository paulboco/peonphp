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
     * The Current URI
     */
    protected $uri;


    /**
     * Class Constructor
     */
    public function __construct() {
        $this->parseUri();
    }

    /**
     * Register A Route
     *
     * @param  string  $path
     * @param  string  $controllerAction
     * @return void
     */
    public function register($path, $controllerAction)
    {
        list($controller, $action) = $this->parseControllerAction($controllerAction);

        $this->registerRoute('GET', $path, $controller, $action);
    }

    /**
     * Dispatch The Route
     *
     * @return void
     */
    public function dispatch()
    {
        // Include the controller class
        require(path() . "/http/controllers/{$this->controller}Controller.php");

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
     * Parse Controller Action
     *
     * @param  string  $controllerAction 
     * @return string
     */
    private function parseControllerAction($controllerAction)
    {
        return explode('@', $controllerAction);
    }

    /**
     * Parse The Request URI
     *
     * @return void
     */
    private function parseUri()
    {
        $this->prepareUri();

        $parts = explode('/', $this->uri);

        $parts = $this->checkForHomePage($parts);

        if (count($parts) < 2) {
            $this->send404();
        }

        $this->setAttributes($parts);
    }

    /**
     * Prepare the URI
     * 
     * @return void
     */
    private function prepareUri()
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/') ?: '/';
    }

    /**
     * Check if the URI is to the home page.
     *
     * @param  array  $parts
     * @return array
     */
    private function checkForHomePage($parts)
    {
        if (count($parts) == 1 and $parts[0] === '') {
            return array(
                'Page',
                'home',
            );
        }

        return $parts;
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

    /**
     * Set Class Attributes
     *
     * @param  array  $parts
     * @return void
     */
    private function setAttributes($parts)
    {
        $this->controller = array_shift($parts);
        $this->controller = ucfirst($this->controller);

        $this->method = array_shift($parts);

        if ( ! empty($parts)) {
            $this->params = $parts;
        }
    }

    /**
     * Register A Single Route
     *
     * @param  string  $verb
     * @param  string  $path
     * @param  string  $controller
     * @param  string  $action
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


}
