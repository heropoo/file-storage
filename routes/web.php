<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/28
 * Time: 18:36
 */

/*Route::group([
    'middleware'=>[
        \App\Middleware\SessionStart::class
    ],
    'prefix'=>'abc'
], function(){
    Route::get('/', function(){
        return 'welcome to file storage server';
    });
    Route::get('/a', function(){
        return 'a';
    });
});

Route::get('/ca', function(){
    return 'a';
});*/


/**
 * @var \Moon\Routing\Router $router
 */
$router = Moon::$app->get('router');

$router->get('', function (){
    return 'welcome';
});

$router->group([
    'middleware'=>[
        \App\Middleware\SessionStart::class,
        \App\Middleware\Auth::class,
    ],
    'prefix'=>'abc'
], function ($router){
    $router->get('/a', function (){
        return 'abc-a';
    });
});