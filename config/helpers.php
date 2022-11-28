<?php

if (!function_exists('monneyFormat')) {
    function monneyFormat($number, $suffix = 'đ') {
        if(!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

if (!function_exists('get_uri')) {
    function get_uri($subforder='') {
        $uri = $_SERVER['REQUEST_URI'];
        if(!empty($uri)) {
            $path = str_replace($subforder, '', $uri);
            $path = strtok($path, "?");
        } else {
            $path = "/";
        }
        
        return $path;
    }
};