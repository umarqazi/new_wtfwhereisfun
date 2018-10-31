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
        $router->resource('testimonials', 'TestimonialController');
        $router->resource('categories', 'CategoryController');
        $router->resource('event-types', 'EventTypeController');
        $router->resource('event-topics', 'EventTopicController');
        $router->resource('blogs', 'BlogController');
        $router->resource('contents', 'ContentPageController');
    });

});
