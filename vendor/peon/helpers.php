<?php

use Peon\App;

if (!function_exists('build_dsn')) {
    /**
     * Build A DSN String From Environmental Variables
     *
     * @return string
     */
    function build_dsn() {
        switch (getenv('DB_TYPE')) {
            case 'sqlsrv':
                $dsn = 'sqlsrv:server=' . getenv('DB_SERVER');
                break;

            case 'mysql':
                $dsn = 'mysql:host=' . getenv('DB_HOST');
                break;

            default:
                throw new Exception('Database type "' . getenv('DB_TYPE') . '" in function build_dsn().', 1);
        }

        return $dsn . ';dbname=' . getenv('DB_NAME');
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
    function config($path, $default = null) {
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
    function d() {
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
    function dd() {
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
    function e($string) {
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
    function path($children = '') {
        return App::getInstance()->getRootPath() . $children;
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
    function segment($position, $value, $default = null) {
        $router = App::getInstance()->make('router');

        if ($router->getSegment($position) == $value) {
            return is_null($default) ? true : $default;
        }

        return false;
    }
}
