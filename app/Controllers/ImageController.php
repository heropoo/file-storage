<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/7
 * Time: 18:51
 */

namespace App\Controllers;

use Intervention\Image\ImageManager;
use Moon\Controller;

class ImageController extends Controller
{
    public function get($path)
    {
        $path = public_path('uploads/' . $path);

        $param = strrchr($path, '-');

        $ext = strrchr($path, '.');

        $origin_file = substr($path, 0, strlen($path) - strlen($param)) . $ext;
        if (!file_exists($origin_file)) {
            abort(404, 'Origin file is not exists');
        }

        $origin_file_dirname = pathinfo($origin_file, PATHINFO_DIRNAME);
        $origin_file_filename = pathinfo($origin_file, PATHINFO_FILENAME);

        // w_320 | h_480 | 320_480
        $param = ltrim($param, '-');
        $param = substr($param, 0, strlen($param) - strlen($ext));
        $param = explode('_', $param);

        $width = isset($param[0]) ? $param[0] : '';
        $height = isset($param[1]) ? $param[1] : '';

        $image_manager = new ImageManager(['driver' => 'gd']);
        $image = $image_manager->make($origin_file);

        if ($width === 'w' && $height > 0) {
            $image->widen($height);
            $thumbnail_filename = $origin_file_dirname . '/' . $origin_file_filename . '-w_' . $height . $ext;
        } else if ($width === 'h' && $height > 0) {
            $image->heighten($height);
            $thumbnail_filename = $origin_file_dirname . '/' . $origin_file_filename . '-h_' . $height . $ext;
        } else if ($width > 0 && $height > 0) {
            $image->resize($width, $height);
            $thumbnail_filename = $origin_file_dirname . '/' . $origin_file_filename . '-' . $width . '_' . $height . $ext;
        } else {
            abort(404, 'Bad params "width" or "height"');
        }

        $image->save($thumbnail_filename);
        return $image->response('png');
    }
}

