<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    */

    'config' => function() {
        return new Peon\Config;
    },

    'pdo' => function() {
        return new PDO('mysql:dbname=peon;host=localhost', 'root', 'root');
    },

    'request' => function() {
        return new Peon\Request;
    },

    'resolver' => function() {
        return new Geary\Resolver;
    },

    'router' => function() {
        return new Peon\Router(Peon\App::getInstance());
    },

    'view' => function() {
        return new Peon\View;
    },

);