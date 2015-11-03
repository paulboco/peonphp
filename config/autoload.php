<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Required Files
    |--------------------------------------------------------------------------
    */

    'files' => array(
        '.env',
        'boot/php.php',
        'vendor/peon/src/helpers.php',
        'vendor/ircmaxell/password.php',
    ),

    /*
    |--------------------------------------------------------------------------
    | Registered Namespaces
    |--------------------------------------------------------------------------
    */

    'namespaces' => array(
        'App\\' => 'app/',
        'Illuminate\\' => 'vendor/illuminate/',
        'Peon\\' => 'vendor/peon/src/',
    ),

);
