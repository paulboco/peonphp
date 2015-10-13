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
        return $this->view->make('page/home', array(
            'dynamic_heading' => 'Dynamic Heading',
            'shared' => $this->shared,
        ));
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

}
