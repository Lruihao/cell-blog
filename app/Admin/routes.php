<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->get('select/categories', 'SelectController@categories');
    $router->get('select/tags', 'SelectController@tags');
    $router->post('editor/upload-image', 'EditorImageController@upload');
    $router->resource('articles', ArticleController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('tags', TagController::class);
    $router->resource('navigations', NavigationController::class);
    $router->resource('systems', SystemController::class);
    $router->resource('pages', PageController::class);
    $router->resource('links', FriendshipLinkController::class);
    $router->resource('mottoes', MottoController::class);

});
