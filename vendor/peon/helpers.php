<?php

use Peon\App;
use Peon\Config;

if (!function_exists('config')) {
    /**
     * Get Configuration Data
     *
     * @param  string  $path
     * @param  mixed   $default
     * @return mixed
     */
    function config($path, $default = null)
    {
        $config = App::getInstance()->make('config');

        return $config->get($path, $default);
    }
}

if (!function_exists('d')) {
    /**
     * Dump Variable
     *
     * @return void
     */
    function d()
    {
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
    }
}

if (!function_exists('dd')) {
    /**
     * Dump Variable and Die
     *
     * @return void
     */
    function dd()
    {
        d(func_get_args());
        die(1);
    }
}

if (!function_exists('e')) {
    /**
     * Echo String Filtered By htmlentities()
     *
     * @param  string  $string
     * @return void
     */
    function e($string)
    {
        echo htmlentities($string);
    }
}

if (!function_exists('path')) {
    /**
     * Get The Application's Base Path
     *
     * @param  string  $children
     * @return string
     */
    function path($children = '')
    {
        return App::getInstance()->getRootPath() . $children;
    }
}

if (!function_exists('redirect')) {
    /**
     * Redirect To The Specified URI
     *
     * @param  string|null  $uri
     * @return void
     */
    function redirect($uri = null)
    {
        header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
    }
}

if (!function_exists('segment')) {
    /**
     * Check A URI Segment For Equality
     *
     * Compares the value of the URI segment at $position with $value.
     * If they are a match, true is returned unless $default is defined in which
     * case $default's value will be returned.
     * If they are not a match, false is returned.
     *
     * @param  integer  $position
     * @param  string  $value
     * @param  mixed  $default
     * @return mixed
     */
    function segment($position, $value, $default = null)
    {
        $router = App::getInstance()->make('router');

        if ($router->getSegment($position) == $value) {
            return is_null($default) ? true : $default;
        }

        return false;
    }
}
