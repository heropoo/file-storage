<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/8
 * Time: 16:47
 */

namespace App\Http\Controllers;


class IndexController extends \Laravel\Lumen\Routing\Controller
{
    public function index(){
        //return $this->render('index');
        return view('index');
    }
}