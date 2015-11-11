<?php

use Peon\Application\App;

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
        return App::getInstance()->config->get($path, $default);
    }
}

if (!function_exists('d')) {
    /**
     * Dump Variable
     *
     * @return void
     * @codeCoverageIgnore
     */
    function d()
    {
        array_map(function ($x) {
            echo '<pre>';
            var_dump($x);
            echo '</pre>';
        }, func_get_args());
    }
}

if (!function_exists('dd')) {
    /**
     * Dump Variable and Die
     *
     * @return void
     * @codeCoverageIgnore
     */
    function dd()
    {
        array_map(function ($x) {
            echo '<pre>';
            var_dump($x);
            echo '</pre>';
        }, func_get_args());
        die();
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

if (!function_exists('activate_if')) {
    /**
     * Return 'active' If Segment Matches Value
     *
     * @param  integer  $position
     * @param  string  $value
     * @param  mixed  $default
     * @return mixed
     */
    function activate_if($position, $value, $default = 'active')
    {
        $router = App::getInstance()->router;

        if ($router->getSegment($position) == $value) {
            return $default;
        }
    }
}
