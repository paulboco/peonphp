<?php

/*
|--------------------------------------------------------------------------
| Require All Dependencies
|--------------------------------------------------------------------------
*/

require('requires.php');

/*
|--------------------------------------------------------------------------
| Dispatch The Route
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Dispatch The Route
|--------------------------------------------------------------------------
*/

$router = new Router();
$router->registerRoutes();
dd($router);
$router->dispatch();
