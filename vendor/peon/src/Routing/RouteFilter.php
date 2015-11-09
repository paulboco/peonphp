<?php

namespace Peon\Routing;

use Peon\Auth;
use Peon\Http\Response;

class RouteFilter
{
    /**
     * The Auth Instance
     *
     * @var Peon\Auth;
     */
    protected $auth;

    /**
     * The Response Instance
     *
     * @var Peon\Auth;
     */
    protected $response;

    /**
     * Create A New Auth RouteFilter
     *
     * @return void
     */
    public function __construct(Auth $auth, Response $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
}
