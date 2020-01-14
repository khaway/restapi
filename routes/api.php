<?php

use App\Http\Controllers\API\{
    OrderController,
    ProductController,
    OrderPaymentController,
    GenerateProductsController
};

/*
|--------------------------------------------------------------------------
| Generate products, 20 by default
|--------------------------------------------------------------------------
*/

$router->get('/generate_products/{amount?}', GenerateProductsController::class);

/*
|--------------------------------------------------------------------------
| Orders resource
|--------------------------------------------------------------------------
*/

$router->resource('orders', OrderController::class);

/*
|--------------------------------------------------------------------------
| Products resource
|--------------------------------------------------------------------------
*/

$router->resource('products', ProductController::class);

/*
|--------------------------------------------------------------------------
| Order payment
|--------------------------------------------------------------------------
*/

$router->post('/orders/payment', OrderPaymentController::class);
