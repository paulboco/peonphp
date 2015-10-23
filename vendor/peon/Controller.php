<?php

namespace Peon;

class Controller
{
    /**
     * The view instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * The request instance
     *
     * @var Peon\Request
     */
    protected $request;

    /**
     * The response instance
     *
     * @var Peon\Response
     */
    protected $response;

    /**
     * The session instance
     *
     * @var Peon\Session
     */
    protected $session;

    /**
     * The config instance
     *
     * @var Peon\Config
     */
    protected $config;

    /**
     * Create A New Controller
     */
    function __construct()
    {
        $app = App::getInstance();

        $this->view = $app->make('view');
        $this->request = $app->make('request');
        $this->response = $app->make('response');
        $this->session = $app->make('session');
        $this->config = $app->make('config');
    }
}