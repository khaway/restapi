<?php

use App\Http\Controllers\{
    HomeController, RunMigrationsController
};

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

$router->get('/', HomeController::class);

/*
|--------------------------------------------------------------------------
| Run migrations helper
|--------------------------------------------------------------------------
*/

$router->get('/run_migrations', RunMigrationsController::class);
