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
     * Send a 404 response
     *
     * @return void
     */
    public function send404()
    {
        header('Page Not Found', true, 404);
        $this->view->make('errors/404');
        exit();
    }
}