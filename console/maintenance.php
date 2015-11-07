<?php

$filename = './storage/app/maintenance';

if ($argc < 2) {
    echo 'Not enough arguments.' . PHP_EOL;
    die;
}

if ($argc > 2) {
    echo 'Too many arguments.' . PHP_EOL;
    die;
}

$command = $argv[1];

if ($command != 'on' and $command != 'off') {
    echo 'Unrecognized argument "' . $command . '".';
    echo "\nValid arguments are " . '"on" and "off".' . PHP_EOL;
    die;
}

if ($command == 'on') {
    if (file_exists($filename)) {
        echo 'Maintenance mode is already on.' . PHP_EOL;
        die;
    }

    touch($filename);
    echo 'Maintenance mode is now on.' . PHP_EOL;
}

if ($command == 'off') {
    if (!file_exists($filename)) {
        echo 'Maintenance mode is already off.' . PHP_EOL;
        die;
    }

    unlink($filename);
    echo 'Maintenance mode is now off.' . PHP_EOL;
}
