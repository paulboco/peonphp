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
     * Class Constructor
     */
    public function __construct() {
        $this->parseUri();
    }

    /**
     * Register GET Routes
     */
    public static function get($path, $controllerAction)
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
        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
            return false;
        }

        require_once __DIR__.'/public/index.php';

        $parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        $this->controller = $parts[0];
        $this->method = $parts[1];
    }

    /**
     * Register A Route
     *
     * @param  string  $path
     * @param  string  $controllerAction
     * @return void
     */
    private static function registerRoute($verb, $path, $controller, $action, $params = array())
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
