<?php

namespace App\Controllers;

use Peon\Config;

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
        return view('page/home', array(
            'dynamic_heading' => 'Dynamic Heading',
            'shared' => $this->shared,
        ));
    }

    /**
     * About Page
     *
     * @return void
     */
    public function about()
    {
        return view('page/about');
    }


}