<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Page Controller Filters
    |--------------------------------------------------------------------------
    */

    'PageController' => array(
        'welcome' => array('guest'),
        'home' => array('auth'),
        'concepts' => array('auth'),
        'helpers' => array('auth'),
        'requirements' => array('auth'),
        'api' => array('dev'),
        'coverage' => array('dev'),
    ),

    /*
    |--------------------------------------------------------------------------
    | Bondservant Controller Filters
    |--------------------------------------------------------------------------
    */

    'BondservantController' => array(
        ':any' => array('auth', 'admin'),
    ),

);
