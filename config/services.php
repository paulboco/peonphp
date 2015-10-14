<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    */

    'bondservant' => function() {
        return new App\Bondservant(
            new PDO('mysql:dbname=peon;host=localhost', 'root', 'root')
        );
    },

    'config' => function() {
        return new Peon\Config();
    },

    'request' => function() {
        return new Peon\Request();
    },

    'router' => function() {
        return new Peon\Router(Peon\App::getInstance());
    },

    'view' => function() {
        return new Peon\View();
    },

);