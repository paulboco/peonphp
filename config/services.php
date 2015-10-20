<?php

################################################################################
################################################################################
# MOVE THIS TO THE WEBSERVER
################################################################################
################################################################################
putenv('DB_TYPE=mysql');
putenv('DB_NAME=peon');
putenv('DB_HOST=localhost');
putenv('DB_USER=root');
putenv('DB_PASS=root');


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
        $type = getenv('DB_TYPE');
        $name = getenv('DB_NAME');
        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');

        return new PDO("{$type}:dbname={$name};host={$host}", $user, $pass);
    },

    'request' => function() {
        return new Peon\Request;
    },

    'resolver' => function() {
        return new Peon\Resolver;
    },

    'response' => function() {
        return new Peon\Response(new Peon\View);
    },

    'router' => function() {
        return new Peon\Router(new Peon\Resolver, new Peon\Response(new Peon\View));
    },

    'session' => function() {
        return new Peon\Session;
    },

    'view' => function() {
        return new Peon\View;
    },

);