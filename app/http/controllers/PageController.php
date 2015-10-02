<?php

namespace App\Http\Controllers;

use Config;

/**
* The Page Controller
*/
class PageController extends Controller
{
    public function home()
    {
        view('/views/page/home.tpl', array(
            'title' => Config::APP_NAME,
            'leftColumnTitle' => 'Left Column Title',
        ));
    }


}