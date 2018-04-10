<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->get('/', 'IndexController@index');

$router->group(['prefix' => 'upload'], function ($router) {
    $router->post('image', 'UploadController@image');
});

$router->group(['prefix' => 'option'], function ($router) {
    $router->post('delete', 'OptionController@delete'); //删除文件
});

$router->get('uploads/{path:.*}', 'ImageController@get');
