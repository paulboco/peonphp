<?php

namespace App\Controllers;

use Peon\Controller;

class PageController extends Controller
{
    /**
     * Welcome Page
     *
     * @return void
     */
    public function welcome()
    {
        return $this->view->make('page/welcome');
    }

    /**
     * Home Page
     *
     * @return void
     */
    public function home()
    {
        return $this->view->make('page/home');
    }

    /**
     * Concepts Page
     *
     * @return void
     */
    public function concepts()
    {
        return $this->view->make('page/concepts');
    }

    /**
     * Helpers Page
     *
     * @return void
     */
    public function helpers()
    {
        return $this->view->make('page/helpers');
    }

    /**
     * Requirements Page
     *
     * @return void
     */
    public function requirements()
    {
        return $this->view->make('page/requirements');
    }

    /**
     * Peon API
     *
     * @return void
     */
    public function api()
    {
        return $this->view->make('page/api');
    }
}
