<?php

namespace App\Controllers;

use App\Bondservant;
use Peon\Request;
use Peon\View;

class BondservantController
{
    /**
     * The bondservant
     *
     * @var App\Bondservant
     */
    protected $bondservant;

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
     * Create a new bondservant controller
     *
     * @return void
     */
    public function __construct(Bondservant $bondservant, View $view, Request $request)
    {
        $this->bondservant = $bondservant;
        $this->view = $view;
        $this->request = $request;
    }

    /**
     * The index
     *
     * @return void
     */
    public function index()
    {
        $this->view->make('bondservant/index', array(
            'rows' => $this->bondservant->index(),
        ));
    }
}