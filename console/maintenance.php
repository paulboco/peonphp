<?php

$filename = './storage/app/maintenance';

if ($argc < 2) {
    $this->fatal('Not enough arguments');
}

if ($argc > 2) {
    $this->fatal('Too many arguments');
}

$command = strtolower($argv[1]);

if ($command != 'on' and $command != 'off') {
    $this->fatal(
        'Unrecognized argument "' . $command . PHP_EOL .
        "Valid arguments are " . '"on" and "off"'
    );
}

if ($command == 'on') {
    if (file_exists($filename)) {
        $this->warning('Maintenance mode is already ON');
        die;
    }

    touch($filename);
    $this->success('Maintenance mode is now ON');
}

if ($command == 'off') {
    if (!file_exists($filename)) {
        $this->warning('Maintenance mode is already OFF');
        die;
    }

    unlink($filename);
    $this->success('Maintenance mode is now OFF');
}
