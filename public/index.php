<?php

define('PEON_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Require The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../boot/autoloader.php';

/*
|--------------------------------------------------------------------------
| Boot The Application
|--------------------------------------------------------------------------
*/

$app = require_once __DIR__ . '/../boot/app.php';

/*
|--------------------------------------------------------------------------
| Start The Session
|--------------------------------------------------------------------------
*/

$app->make('session')->start($app);

/*
|--------------------------------------------------------------------------
| Make A New Router
|--------------------------------------------------------------------------
*/

$router = $app->make('router');

/*
|--------------------------------------------------------------------------
| Make A New Response
|--------------------------------------------------------------------------
*/

$response = $app->make('response');

/*
|--------------------------------------------------------------------------
| Dispatch The Route And Send The Response
|--------------------------------------------------------------------------
*/

$response->send($router->dispatch());
