<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    */

    'bondservant' => function() {
        return new App\Bondservant;
    },

    'config' => function() {
        return new Peon\Config();
    },

    'pdo' => function() {
        return new PDO('mysql:dbname=peon;host=localhost', 'root', 'root');
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