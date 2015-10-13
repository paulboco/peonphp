<?php

namespace App\Controllers;

use Peon\Controller;
use Peon\View;

/**
 * The Page Controller
 */
class PageController extends Controller
{
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
