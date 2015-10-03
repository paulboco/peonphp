<?php

namespace App\Controllers;

use Config;

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
            'dynamicHeading' => 'Dynamic Heading',
        ));
    }


}