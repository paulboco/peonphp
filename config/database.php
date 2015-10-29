<?php

return array(

    'default' => 'mysql',

    'connections' => array(

        'mysql' => array(
            'dsn' => 'mysql:host=%host%;dbname=%name%',
            'type' => getenv('DB_TYPE'),
            'host' => getenv('DB_HOST'),
            'name' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
            'options' => array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ),
        ),

        'sqlsrv' => array(
            'dsn' => 'sqlsrv:server=%host%;database=%name%',
            'type' => getenv('DB_TYPE'),
            'host' => getenv('DB_HOST'),
            'name' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
            'options' => array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ),
        ),
    ),
);