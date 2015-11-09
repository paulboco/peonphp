<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Register Bindings
    |--------------------------------------------------------------------------
    */

    'alert' => function() {
        return new Peon\Alert(new Peon\Session\Session);
    },

    'auth' => function () {
        return new Peon\Auth(new App\Models\User, new Peon\Session\Session);
    },

    'config' => function () {
        return new Peon\Config;
    },

    'request' => function () {
        return new Peon\Http\Request;
    },

    'response' => function () {
        return new Peon\Http\Response(new Peon\View);
    },

    'router' => function () {
        return new Peon\Routing\Router(
            new Peon\Application\Resolver,
            new Peon\Http\Response(new Peon\View)
        );
    },

    'session' => function () {
        return new Peon\Session\Session;
    },

    'sessionhandler' => function () {
        return new Peon\Session\SessionHandler;
    },

    'view' => function () {
        return new Peon\View;
    },

);
