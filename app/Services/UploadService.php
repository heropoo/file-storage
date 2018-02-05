<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/5
 * Time: 15:22
 */
namespace App\Services;

class UploadService
{
    public static function makePath($prefix = 'uploads'){
        $path = date('Y/m/d/H');
        return strlen($prefix) > 0 ? $prefix.'/'.$path : $path;
    }
}