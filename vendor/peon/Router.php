<?php

namespace Peon;

use Peon\App;

/**
 * Peon Router
 *
 * The Peon Router is a VERY simple router based the assumption that segment one
 * of the requested URI is a controller name (without the 'Controller' appendage)
 * and segment two is name of the controller's method.
 *
 * For example, the URL http://example.com/user/dashboard would map to
 * the dashboard() method of class UserController.
 * e.g.,
 *
 *     <?php
 *
 *     class UserController
 *     {
 *         public function dashboard()
 *         {
 *             // ...
 *         }
 *     }
 *
 * All controllers exist in the 'project/Controllers' directory and use
 * studly case with the word 'Controllers' appending the class name.
 * Therefore, if segment one is 'user', the full class name would be
 * 'UserController' and the file containing the class would be
 * 'project/Controllers/UserController.php'.
 *
 * If no controller method can be found matching segments one and two, a
 * 404 response is returned to the browser.
 *
 * The one exception to this rule is when the base URL is requested - i.e.,
 * 'http://example.com'. In this case, the router will map to controller
 * 'PageController' and its 'home' method.
 */
class Router
{
    /**
     * The app instance
     *
     * @var Peon\App
     */
    protected $app;

    /**
     * The Current URI
     *
     * @var string
     */
    protected $uri;

    /**
     * The URI Segments
     *
     * @var array
     */
    protected $segments;

    /**
     * The Controller
     *
     * @var string
     */
    protected $controller;

    /**
     * The Controller's Method
     *
     * @var string
     */
    protected $method;

    /**
     * The Route Parameters
     *
     * @var array
     */
    protected $params;

    /**
     * Create a new router
     *
     * @return void
     */
    public function __construct(App $app)
    {
        $this->app = $app;

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
        $this->validateRoute();
        $this->callControllerMethod();
    }

    /**
     * Get A URI Segment By Position
     *
     * @param  integer  $position
     * @param  string  $default
     * @return string
     */
    public function getSegment($position, $default = '')
    {
        if (isset($this->segments[$position - 1])) {
            return $this->segments[$position - 1];
        }

        return $default;
    }

    /**
     * Prepare the URI
     *
     * @return void
     */
    private function prepareUri()
    {
        $uri = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
        $uri = preg_replace('~/+~', '/', $uri);

        $this->uri = trim($uri, '/') ?: 'page/home';
    }

    /**
     * Extract URI Segments to Class Properties
     *
     * @return void
     */
    private function extractSegments()
    {
        $segments = explode('/', $this->uri);
        $this->segments = $segments;

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
        return "App\\Controllers\\"
        . ucfirst($controller)
        . 'Controller';
    }

    /**
     * Format the Controller Method Segment
     *
     * @param  string  $method
     * @return void
     */
    private function formatMethod($method)
    {
        $segments = array_map(function ($segment) {
            return ucfirst($segment);
        }, explode('-', $method));

        return lcfirst(implode('', $segments));
    }

    /**
     * Validate The Route
     *
     * @return void
     */
    private function validateRoute()
    {
        // Send a 404 if the controller method doesn't exist
        if (!method_exists($this->controller, $this->method)) {
            $this->send404();
        }
    }

    /**
     * Send 404
     *
     * @return void
     */
    private function send404()
    {
        header('Page Not Found', true, 404);
        view('errors/404');
        exit();
    }

    /**
     * Call the Controller Method
     *
     * @return void
     */
    private function callControllerMethod()
    {
        call_user_func_array(array(
            new $this->controller($this->app->make('request')),
            $this->method,
        ), $this->params);
    }
}
