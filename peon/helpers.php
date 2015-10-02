<?php

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

/**
 * Get The Filesystem Path
 *
 * @return string
 */
function path() {
    return realpath(__DIR__ . '/../');
}

/**
 * View Helper
 */
function view($template, $data = array()) {
    extract($data);
    require(path() . $template);
}

