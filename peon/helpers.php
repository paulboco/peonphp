<?php

/**
 * Get Configuration Data From An Included File
 *
 * @param  string  $path
 * @return void
 */
function config($path) {
    return include path() . "/config/{$path}.php";
}

/**
 * Get The Filesystem Path
 *
 * @return string
 */
function path($extension = '') {
    return realpath(__DIR__ . '/../') . $extension;
}

/**
 * View Helper
 */
function view($template, $data = array()) {
    extract($data);
    $errors = isset($errors) ? $errors : array();

    include path() . "/views/{$template}.tpl";
}


/**
 * Redirect
 */
function redirect($uri) {
    header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
}


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
 * @param mixed $var
 * @return void
 */
function dv($var) {
    echo '<pre>';
    var_export($var);
    echo '</pre>';
    die;
}
