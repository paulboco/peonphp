<?php

/*
|--------------------------------------------------------------------------
| Register The Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendor/peon/src/Autoloader.php';
$autoloader = new \Peon\Autoloader;
$autoloader->register();

/*
|--------------------------------------------------------------------------
| Get Autoloader Configuration
|--------------------------------------------------------------------------
*/

$autoloaderConfig = require __DIR__ . '/../config/autoload.php';

/*
|--------------------------------------------------------------------------
| Require Files
|--------------------------------------------------------------------------
*/

foreach ($autoloaderConfig['files'] as $path) {
    require(__DIR__ . '/../' . $path);
}

/*
|--------------------------------------------------------------------------
| Register Namespaces
|--------------------------------------------------------------------------
*/

foreach ($autoloaderConfig['namespaces'] as $namespace => $path) {
    $autoloader->registerNamespace($namespace, realpath(__DIR__ . '/../' . $path));
}

/*
|--------------------------------------------------------------------------
| Clean Up
|--------------------------------------------------------------------------
*/

unset($autoloaderConfig, $autoloader, $namespace, $path);
