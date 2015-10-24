<?php

return array(

    'PageController' => array(
        'welcome'      => array('home'),
        'home'         => array('auth'),
        'concepts'     => array('auth'),
        'helpers'      => array('auth'),
        'requirements' => array('auth'),
        'api'          => array('auth'),
    ),

    'BondservantController' => array(
        ':any' => array('auth', 'admin'),
    ),

);