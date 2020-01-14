<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Redirector;
use Illuminate\Container\Container;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\FallbackController;
use Illuminate\Database\Capsule\Manager as Capsule;

/*
|--------------------------------------------------------------------------
| Get an app instance
|--------------------------------------------------------------------------
*/

$app = app();

/*
|--------------------------------------------------------------------------
| Load .env in our application
|--------------------------------------------------------------------------
*/

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));

$dotenv->load();

$app->instance('dotenv', $dotenv);

/*
|--------------------------------------------------------------------------
| Create a request from server variables, and bind it to the container
|--------------------------------------------------------------------------
*/

$request = Request::capture();

$app->instance(Request::class, $request);

/*
|--------------------------------------------------------------------------
| Create a event dispatcher, and bind it to the container
|--------------------------------------------------------------------------
*/

$events = new Dispatcher($app);

/*
|--------------------------------------------------------------------------
| Create the router instance
|--------------------------------------------------------------------------
|
| Register API routes, WEB router and fallback route.
|
*/

$router = new Router($events, $app);

// Register API routes.
$router
    ->prefix('api')
    ->group('../routes/api.php');

// Register WEB routes (common).
$router
    ->prefix('web')
    ->group('../routes/web.php');

// Register fallback route for errors and etc.
$router->fallback(FallbackController::class);

/*
|--------------------------------------------------------------------------
| Create the redirector instance
|--------------------------------------------------------------------------
*/

$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

/*
|--------------------------------------------------------------------------
| Create the Capsule instnce and init EloquentORM
|--------------------------------------------------------------------------
*/

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DB_DRIVER'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => $_ENV['DB_CHARSET'],
    'collation' => $_ENV['DB_COLLATION'],
    'prefix'    => $_ENV['DB_PREFIX'],
]);

 // Set the event dispatcher used by Eloquent models...
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods...
$capsule->setAsGlobal();

// Setup the Eloquent ORM...
$capsule->bootEloquent();

// Bind Capsule instance to the container.
$app->instance(Capsule::class, $capsule);
