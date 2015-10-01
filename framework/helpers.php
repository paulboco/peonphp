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
 * Get The Filesystem Path
 * 
 * @return string
 */
function path() {
	return realpath('../');	
}

/**
 * View
 */
function view($template, $data) {
	$template = file_get_contents(path() . "/views/{$template}.php");
dd($template);
	$search = array_keys($data);
	$replace = array_values($data);

	$template = str_replace($search, $replace, $template);
	echo $template;
}