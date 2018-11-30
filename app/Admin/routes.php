<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'middleware'    => config('admin.route.middleware'),
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');

    Route::prefix('auth')->group(function (Router $router) {
        $router->resource('vendors', 'VendorController');
        $router->resource('customers', 'CustomerController');
        $router->resource('testimonials', 'TestimonialController');
        $router->resource('categories', 'CategoryController');
        $router->resource('event-types', 'EventTypeController');
        $router->resource('event-topics', 'EventTopicController');
        $router->resource('blogs', 'BlogController');
        $router->resource('contents', 'ContentPageController');
        $router->resource('events', 'EventLocationController');
        $router->resource('disputes', 'DisputeController')->only(['index', 'show']);

        $router->get('event/location/{id}/orders', 'EventLocationController@getLocationOrders');

        Route::prefix('events')->group(function (Router $router) {
            $router->get('approve/{id}', 'EventController@approveEvent');
            $router->get('block/{id}', 'EventController@blockEvent');
        });

        Route::prefix('vendors')->group(function (Router $router) {
            $router->get('unblock/{id}', 'VendorController@unBlockVendor');
            $router->get('block/{id}', 'VendorController@blockVendor');
        });

        Route::prefix('customers')->group(function (Router $router) {
            $router->get('unblock/{id}', 'CustomerController@unBlockVendor');
            $router->get('block/{id}', 'CustomerController@blockVendor');
        });
    });

});
