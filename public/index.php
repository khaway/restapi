<?php

/**
 * Rest API test.
 *
 * @package  RestAPI
 * @author   Andrey Kolesnikov <assupport@yandex.com>
 */

define('APP_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Include automatically generated class loader for our application.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap application things
|--------------------------------------------------------------------------
|
| This bootstraps required components.
|
*/

require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Dispatch the request through the router
| and send the response back to the browser
|--------------------------------------------------------------------------
*/

$router->dispatch($request)->send();
