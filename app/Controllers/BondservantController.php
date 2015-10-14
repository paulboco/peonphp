<?php

namespace App\Controllers;

use Peon\Controller;

class BondservantController extends Controller
{
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
