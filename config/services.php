<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    |
    | You may register and classes that have dependencies here.
    |
    |--------------------------------------------------------------------------
    */

    'config' => function() {
        return new Peon\Config();
    },

    'controller' => function() {
        return new Peon\Controller();
    },

    'request' => function() {
        return new Peon\Request();
    },

    'router' => function() {
        return new Peon\Router(new Peon\App);
    },

);