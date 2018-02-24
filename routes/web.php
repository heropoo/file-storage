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
 * @var \Laravel\Lumen\Routing\Router
 */
$router->get('/', 'IndexController@index');

$router->group(['prefix'=>'upload'], function () use ($router){
    $router->post('image', 'UploadController@image');
});

/*$router->get('uploads/{path}', 'ImageController@get')
    ->where('path', '(.*)');*/

$router->get('uploads/{path:.*}', 'ImageController@get');
