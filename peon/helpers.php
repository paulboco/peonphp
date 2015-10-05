<?php

use Peon\Config;

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

/**
 * Get The Filesystem Path
 *
 * @param  string  $children
 * @return string
 */
function path($children = '') {
    return realpath(__DIR__ . '/../') . $children;
}

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


/**
 * Redirect
 *
 * @param  string  $uri
 * @return void
 */
function redirect($uri) {
    header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
}

/**
 * Echo An Filtered String
 *
 * @param  string  $string
 * @return void
 */
function e($string) {
    echo htmlentities($string);
}

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

/**
 * Export Variable and Die
 *
 * @param  mixed  $var
 * @return void
 */
function dv($var) {
    echo '<pre>';
    var_export($var, 1);
    echo '</pre>';
    die;
}
