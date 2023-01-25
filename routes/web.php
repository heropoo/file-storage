<?php
/**
 * Created by PhpStorm.
 * User: heropoo
 * Date: 2018/1/28
 * Time: 18:36
 */

use Moon\Routing\Router;
use Moon\Request\Request;

/** @var Router $router */

$router->get('/', 'IndexController::index');

$router->group(['prefix'=>'upload'], function ($router){
    $router->post('image', 'UploadController::image');
});

$router->get('img/{path}', 'ImageController::get');