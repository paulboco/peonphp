<?php
use Peon\Config;
use Peon\Container;
use Peon\Request;

function d($var)
{
    var_dump($var);
}

if (!function_exists('active')) {
    /**
     * Set Active By Segment
     *
     * Returns the string 'active' when $segment equals $name.
     *
     * @param  integer  $segment
     * @param  string  $name
     * @return string
     */
    function active($segment, $name)
    {
        $router = Container::getInstance()->make('router');

        return $router->segment($segment) == $name ? 'active' : '';
    }
}

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
        $config = Container::getInstance()->make('config');

        return $config->get($path, $default);
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
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
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
        return Container::getInstance()->basePath . $children;
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

if (!function_exists('request')) {
    /**
     * Get The Request
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function request($key = null, $default = null)
    {
        $request = Container::getInstance()->make('request');

        return $request->get($key, $default);
    }
}

if (!function_exists('view')) {
    /**
     * Display A View
     *
     * @param  string  $template
     * @param  array   $data
     * @return void
     */
    function view($template, $data = array())
    {
        extract($data);
        $errors = isset($errors) ? $errors : array();

        include path("/views/{$template}.tpl");
    }
}
