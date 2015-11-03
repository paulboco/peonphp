<?php

namespace Peon;

class Filter
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
     * Create A New Auth Filter
     *
     * @return void
     */
    public function __construct(Auth $auth, Response $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
}
