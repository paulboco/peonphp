<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';



$router = New Router;
die;








/*
|--------------------------------------------------------------------------
| Include Framework Services
|--------------------------------------------------------------------------
|
*/

require('../services/helpers.php');
require('../services/Router.php');
require('../services/Mssql.php');
require('../app/Http/Controllers/Controller.php');

/*
|--------------------------------------------------------------------------
| Dispatch the Route
|--------------------------------------------------------------------------
*/

$router = new Router();
$router->dispatch();
