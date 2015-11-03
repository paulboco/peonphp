<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Services
    |--------------------------------------------------------------------------
    */

    'auth' => function () {
        return new Peon\Auth(new App\Models\User, new Peon\Session);
    },

    'config' => function () {
        return new Peon\Config;
    },

    // 'pdo' => function () {
    //     return new PDO(new Peon\Config);
    // },

    'request' => function () {
        return new Peon\Request;
    },

    'response' => function () {
        return new Peon\Response(new Peon\View);
    },

    'router' => function () {
        return new Peon\Router(new Peon\Resolver, new Peon\Response(new Peon\View));
    },

    'session' => function () {
        return new Peon\Session;
    },

    'sessionhandler' => function () {
        return new Peon\SessionHandler;
    },

    'view' => function () {
        return new Peon\View;
    },

);
