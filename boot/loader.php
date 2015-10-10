<?php

/*
|--------------------------------------------------------------------------
| Register The Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendors/phpfig/Autoloader.php';
$loader = new \Phpfig\Autoloader;
$loader->register();

/*
|--------------------------------------------------------------------------
| Add PSR-4 Namespaces
|--------------------------------------------------------------------------
*/

$loader->addNamespace('App', __DIR__ . '/../app');
$loader->addNamespace('Peon', __DIR__ . '/../vendors/peon');
$loader->addNamespace('Erusev', __DIR__ . '/../vendors/erusev');

/*
|--------------------------------------------------------------------------
| Require Any Single Files
|--------------------------------------------------------------------------
*/

require(__DIR__ . '/../vendors/peon/helpers.php');
