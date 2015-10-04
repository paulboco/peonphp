<?php

/*
|--------------------------------------------------------------------------
| Register The Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendor/phpfig/Psr4Autoloader.php';
$loader = new \Phpfig\Psr4Autoloader;
$loader->register();

/*
|--------------------------------------------------------------------------
| Add PSR4 Namespaces
|--------------------------------------------------------------------------
*/

$loader->addNamespace('App', __DIR__ . '/../app');
$loader->addNamespace('Peon', __DIR__ . '/../peon');
$loader->addNamespace('Vendor', __DIR__ . '/../vendor');

/*
|--------------------------------------------------------------------------
| Require Any Single Files
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../peon/helpers.php';
require __DIR__ . '/../config/Config.php';
