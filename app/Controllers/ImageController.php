<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/7
 * Time: 18:51
 */

namespace App\Controllers;


use Moon\Controller;

class ImageController extends Controller
{
    public function get($path){
        $path = public_path('uploads/'.$path);

        $param = strrchr($path, '-');

        $ext = strrchr($path, '.');

        $origin_file = substr($path, 0, strlen($path) - strlen($param)).$ext;
        if(!file_exists($origin_file)){
            abort(404, 'Origin file is not exists');
        }


        // w_320 | h_480 | 320_480

        $param = ltrim($param, '-');
        $param = substr($param, 0, strlen($param) - strlen($ext));
        $param = explode('_', $param);
        $width = isset($param[0]) ? $param[0] : 0;
        $height = isset($param[1]) ? $param[1] : 0;

        if($width > 0 || $height > 0){
            //abort(404, 'Bad width or height');
        }else if($width === 'w' && $height){
            $width = $height;
        }

        var_dump($width, $height);
        //todo 写个 检验数字 字母的类
    }
}