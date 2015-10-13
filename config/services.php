<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    */

    'config' => function() {
        return new Peon\Config();
    },

    'request' => function() {
        return new Peon\Request();
    },

    'router' => function() {
        return new Peon\Router(Peon\App::getInstance());
    },

);