<?php

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
