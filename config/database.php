<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Default Connection
    |--------------------------------------------------------------------------
    */

    'default' => 'mysql',

    /*
    |--------------------------------------------------------------------------
    | Configured Connections
    |--------------------------------------------------------------------------
    */

    'connections' => array(

        'mysql' => array(
            'dsn' => getenv('DB_DSN'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
        ),

        'sqlsrv' => array(
            'dsn' => getenv('DB_DSN'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
        ),
    ),

);
