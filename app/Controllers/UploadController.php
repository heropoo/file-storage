<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/5
 * Time: 11:07
 */

namespace App\Controllers;

use App\Services\UploadService;
use Moon\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadController extends Controller
{
    public function image()
    {
        $request = request();
        $key = $request->get('key');   //上传的文件key
        $size = $request->get('size', 2048);   //上传的文件大小 单位KB 默认2MB
        if (empty($key)) {
            return [
                'ret' => 10010,
                'msg' => '上传文件key为空！'
            ];
        }

        /**
         * @var UploadedFile $file
         */
        $file = $request->files->get($key);
        if (empty($file)) {
            return [
                'ret' => 10011,
                'msg' => '上传文件为空！'
            ];
        }

        $file_size = $file->getSize();
        if ($file_size > $size * 1024) {
            return [
                'ret' => 10012,
                'msg' => '上传文件过大'
            ];
        }

        if (!$file->isFile()) {
            return [
                'ret' => 10013,
                'msg' => '文件上传出错！'
            ];
        }

        $file_ext = $file->getClientOriginalExtension();

        $path = UploadService::makePath();

        $dstPath = public_path($path);

        if (!file_exists($dstPath))
            mkdir($dstPath, 0755, true);
        $filename = uniqid() . mt_rand(10000, 99999) . '.' . $file_ext;

        $originFilename = $file->getPathname();

        if (!move_uploaded_file($originFilename, $dstPath . '/' . $filename)) {
            return [
                'ret' => 10014,
                'msg' => '保存文件失败！'
            ];
        }

        return [
            'ret' => 200,
            'msg' => '文件上传成功！',
            'data' => [
                'url' => '/' . $path . '/' . $filename,
                'size' => $file_size,
                'ext' => $file_ext,
                'filename' => $filename
            ]
        ];
    }
}