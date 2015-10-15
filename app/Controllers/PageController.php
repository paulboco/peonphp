<?php

namespace App\Controllers;

use Peon\View;

class PageController
{
    /**
     * The view instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * Create a new page controller
     *
     * @param  Peon\View  $view
     * @param  Peon\Request  $request
     * @return void
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Home Page
     *
     * @return void
     */
    public function home()
    {
        $this->view->make('page/home');
    }

    /**
     * Concepts Page
     *
     * @return void
     */
    public function concepts()
    {
        $this->view->make('page/concepts');
    }

    /**
     * Helpers Page
     *
     * @return void
     */
    public function helpers()
    {
        $this->view->make('page/helpers');
    }

    /**
     * Requirements Page
     *
     * @return void
     */
    public function requirements()
    {
        $this->view->make('page/requirements');
    }

    /**
     * Peon API
     *
     * @return void
     */
    public function api()
    {
        $this->view->make('page/api');
    }
}
