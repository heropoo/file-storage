<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/24
 * Time: 23:07
 */

if (!function_exists('public_path')) {
    /**
     * @param string $path
     * @return string
     */
    function public_path($path = '')
    {
        return dirname(app()->path()) . DIRECTORY_SEPARATOR . 'public' . (strlen($path) ? DIRECTORY_SEPARATOR . $path : '');
    }
}