<?php

$require = array(
    'Peon\\' => '/src/',
    'Illuminate\\' => '/../illuminate/',
);

foreach ($require as $namespace => $path) {
    spl_autoload_register(function ($class) use ($namespace, $path) {
        $prefix = $namespace;
        $base_dir = __DIR__ . $path;
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }
        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });
}
