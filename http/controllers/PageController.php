<?php

/**
* The Page Controller
*/
class PageController
{
    /**
     * Create Pages object
     */
    function __construct()
    {
        # code...
    }

    public function home()
    {
        require_once(path() . '/views/pages/home.php');
    }


}