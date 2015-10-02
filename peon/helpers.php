<?php

/**
 * Dump Variable and Die
 *
 * @param mixed $var
 * @return void
 */
function dd($var) {
    var_dump($var);
    die;
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
    require_once(path() . $template);
}

