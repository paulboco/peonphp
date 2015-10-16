<?php

namespace Peon;

class Response
{
    /**
     * The view instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * Create a new response
     *
     * @return void
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Redirect To A URL
     *
     * @return void
     */
    public function redirect($uri = null)
    {
        header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
        die;
    }

    /**
     * Send A 404 Response
     *
     * @return void
     */
    public function send404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->view->make('errors/404');
        die;
    }

    /**
     * Send A 503 Response
     *
     * @return void
     */
    public function send503()
    {
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header('Retry-After: 3600');
        include path('/views/errors/503.tpl');
        die;
    }
}