<?php

namespace App\Controllers;

use App\Bondservant;
use Peon\Request;
use Peon\View;

class BondservantController
{
    protected $view;
    protected $request;
    protected $bondservant;

    public function __construct(View $view, Request $request, \App\Bondservant $bondservant)
    {
        $this->request = $request;
        $this->view = $view;
        $this->bondservant = $bondservant;
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
