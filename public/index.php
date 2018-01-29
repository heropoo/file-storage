<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/1/26
 * Time: 16:11
 */

require '../vendor/autoload.php';

$app = new \Moon\Application(dirname(__DIR__));
$app->enableDebug();
$app->run();