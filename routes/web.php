<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/28
 * Time: 18:36
 */

/**
 * @var \Moon\Routing\Router $router
 */
$router = Moon::$app->get('router');

$router->get('/', function (){
    return 'welcome to file storage';
});

$router->group(['prefix'=>'upload'], function ($router){
    $router->post('image', 'UploadController::image');
});

$router->get('uploads/{path}', 'ImageController::get')
    ->setRequirement('path', '(.*)');