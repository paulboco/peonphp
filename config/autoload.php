<?php

return array(

    /*
    |---------------------------------------------------------------------------
    | Autoload Namespaces
    |---------------------------------------------------------------------------
    */

    'namespaces' => array(
        'App\\' => 'app/',
        'Illuminate\\' => 'vendor/illuminate/',
        'Peon\\' => 'vendor/peon/',
    ),

    /*
    |---------------------------------------------------------------------------
    | Autoload Files
    |---------------------------------------------------------------------------
    */

    'files' => array(
        '.env',
        'boot/php.php',
        'vendor/peon/helpers.php',
        'vendor/ircmaxell/password.php'
    ),

);