<?php

namespace Peon\Routing;

use Peon\Application\Resolver;
use Peon\Http\Response;

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
     * @var Peon\Http\Response
     */
    protected $response;

    /**
     * The Current URI
     *
     * @static string
     */
    protected static $uri;

    /**
     * The URI Segments
     *
     * @static array
     */
    protected static $segments;

    /**
     * The Controller
     *
     * @static string
     */
    protected static $controller;

    /**
     * The Controller's Method
     *
     * @static string
     */
    protected static $method;

    /**
     * The Route Parameters
     *
     * @static array
     */
    protected static $params;

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
    }

    /**
     * Dispatch The Route
     *
     * @return void
     */
    public function dispatch()
    {
        $this->extractSegments();

        if (!$this->validRoute()) {
            return $this->response->send404();
        }

        $this->applyFilters(self::$controller, self::$method);

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
        if (isset(self::$segments[$position - 1])) {
            return self::$segments[$position - 1];
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
        $requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        $queryString = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

        $uri = str_replace('?' . $queryString, '', $requestUri);
        $uri = preg_replace('~/+~', '/', $uri);

        self::$uri = trim($uri, '/') ?: 'page/welcome';
    }

    /**
     * Extract URI Segments to Class Properties
     *
     * @return void
     */
    private function extractSegments()
    {
        $segments = explode('/', self::$uri);
        self::$segments = $segments;

        self::$controller = $this->formatController(array_shift($segments));
        self::$method = $this->formatMethod(array_shift($segments));
        self::$params = empty($segments) ? array() : $segments;
    }

    /**
     * Format The Controller Segment
     *
     * @param  string  $controller
     * @return void
     */
    private function formatController($controller)
    {
        $controller = array_map(function ($segment) {
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
    private function validRoute()
    {
        return method_exists(self::$controller, self::$method);
    }

    /**
     * Call The Controller Method
     *
     * @return void
     */
    private function callControllerMethod()
    {
        return call_user_func_array(array(
            $this->resolver->resolve(self::$controller),
            self::$method,
        ), self::$params);
    }
}
