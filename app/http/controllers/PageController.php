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
        view('/views/page/home.tpl', array(
            'title' => 'The Bartlett Test Repository',
            'leftColumnTitle' => 'Left Column Title',
        ));
    }


}