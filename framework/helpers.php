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
 * View
 */
function view($template, $data) {
    $template = file_get_contents(path() . "/views/{$template}.php");

    $search = format_search_strings(array_keys($data));

    $replace = array_values($data);

    $template = str_replace($search, $replace, $template);
    echo $template;
}

function format_search_strings($search) {
    return array_map(
        function($value) {
            return '{{' . $value . '}}';
        },
        $search
    );
}



