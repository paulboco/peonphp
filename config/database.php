<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | The Default Database Connection Name
    |--------------------------------------------------------------------------
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Configured Connections
    |--------------------------------------------------------------------------
    */

    'connections' => array(

        'mysql' => array(
            'type' => env('DB_TYPE', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'name' => env('DB_NAME', 'peon'),
            'char' => env('DB_CHAR', 'urf8'),
            'user' => env('DB_USER', 'homestead'),
            'pass' => env('DB_PASS', 'secret'),
        ),

        'mssql' => array(),

    ),

);