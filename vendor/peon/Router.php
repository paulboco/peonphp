<?php

namespace Peon;

/**
 * Peon Router
 *
 * The Peon Router is based the assumption that segment one
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

class Router extends RouteFilterApplicator
{
    /**
     * The Resolver Instance
     *
     * @var Peon\Resolver
     */
    protected $resolver;

    /**
     * The Response Instance
     *
     * @var Peon\Response
     */
    protected $response;

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
    public function __construct(Resolver $resolver, Response $response)
    {
        $this->resolver = $resolver;
        $this->response = $response;

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
        $this->applyFilters($this->controller, $this->method);

        return $this->callControllerMethod();
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

        $this->uri = trim($uri, '/') ?: 'page/welcome';
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
     * Format The Controller Segment
     *
     * @param  string  $controller
     * @return void
     */
    private function formatController($controller)
    {
        $controller = array_map(function($segment) {
            return ucfirst(strtolower($segment));
        }, explode('-', $controller));

        return "App\\Controllers\\" . implode('\\', $controller) . 'Controller';
    }

    /**
     * Format The Controller Method Segment
     *
     * @param  string  $method
     * @return void
     */
    private function formatMethod($method)
    {
        $segments = array_map(function ($segment) {
            return ucfirst(strtolower($segment));
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
            $this->response->send404();
        }
    }

    /**
     * Call The Controller Method
     *
     * @return void
     */
    private function callControllerMethod()
    {
        return call_user_func_array(array(
            $this->resolver->resolve($this->controller),
            $this->method,
        ), $this->params);
    }
}
