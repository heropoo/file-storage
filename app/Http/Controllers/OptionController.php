<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/4/9
 * Time: 16:18
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class OptionController extends Controller
{
    public function delete(Request $request)
    {
        $res = app('db');
        var_dump($res);exit;

//        $file = $request->get('file', '');
//        if(empty($file)){
//            return [
//                ''
//            ];
//        }

        $this->validate($request, [
            'filename' => 'required',
        ], [
            'filename.required' => '文件名称不能为空',
        ]);

    }
}