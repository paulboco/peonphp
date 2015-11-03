<?php

/*
|--------------------------------------------------------------------------
| Register The Autoloader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendor/phpfig/Autoloader.php';
$autoloader = new \Phpfig\Autoloader;
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
    $autoloader->addNamespace($namespace, __DIR__ . '/../' . $path);
}

/*
|--------------------------------------------------------------------------
| Clean Up
|--------------------------------------------------------------------------
*/

unset($autoloaderConfig, $autoloader, $namespace, $path);
