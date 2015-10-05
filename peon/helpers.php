<?php

use Peon\Config;
use Peon\Request;

if ( ! function_exists('config')) {
    /**
     * Get Configuration Data
     *
     * @param  string  $path
     * @param  mixed   $default
     * @return mixed
     */
    function config($path, $default = null) {
        $config = new Config;

        return $config->get($path, $default);
    }
}

if ( ! function_exists('dd')) {
    /**
     * Dump Variable and Die
     *
     * @return void
     */
    function dd() {
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die(1);
    }
}

if ( ! function_exists('e')) {
    /**
     * Echo An Filtered String
     *
     * @param  string  $string
     * @return void
     */
    function e($string) {
        echo htmlentities($string);
    }
}

if ( ! function_exists('env')) {
    /**
     * Get An Environmental Variable
     *
     * @param  string  $name
     * @param  mixed   $default
     * @return string
     */
    function env($name, $default = null)
    {
        return getenv($name) ?: $default;
    }
}

if ( ! function_exists('path')) {
    /**
     * Get The Filesystem Path
     *
     * @param  string  $children
     * @return string
     */
    function path($children = '') {
        return realpath(__DIR__ . '/../') . $children;
    }
}

if ( ! function_exists('redirect')) {
    /**
     * Redirect
     *
     * @param  string  $uri
     * @return void
     */
    function redirect($uri) {
        header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
    }
}

if ( ! function_exists('request')) {
    /**
     * Get The Request
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function request($key = null, $default = null) {
        $request = new Request;

        return $request->get($key, $default);
    }
}

if ( ! function_exists('view')) {
    /**
     * Display A View
     *
     * @param  string  $template
     * @param  array   $data
     * @return void
     */
    function view($template, $data = array()) {
        extract($data);
        $errors = isset($errors) ? $errors : array();

        include path() . "/views/{$template}.tpl";
    }
}
