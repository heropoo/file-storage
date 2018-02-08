<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/8
 * Time: 16:47
 */

namespace App\Controllers;


use Moon\Controller;

class IndexController extends Controller
{
    public function index(){
        return $this->render('index');
    }
}