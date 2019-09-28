<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('types', TypeController::class);
    $router->resource('products', ProductController::class);
    $router->resource('customers', CustomerController::class);
    $router->resource('applies', ApplyController::class);
    $router->resource('recommends', RecommendController::class);

});
