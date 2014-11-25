<?php

$domain = Request::server('HTTP_HOST');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Control Admin | Front Website conditioning for routes
|--------------------------------------------------------------------------
|
| Responsible to choose which group of routes to include
|
*/

require app_path(). '/routes/web/routes.php';
require app_path(). '/routes/control/routes.php';

