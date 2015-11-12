<?php

$database = 'peon';
$username = getenv('DB_USER');
$password = getenv('DB_PASS');

if ($argc < 1) {
    $this->fatal('Not enough arguments');
}

if ($argc > 1) {
    $this->fatal('Too many arguments');
}

if (!extension_loaded('mysql')) {
    $this->fatal('MySql is not loaded');
}

exec("mysql -u{$username} -p{$password} -e 'DROP DATABASE IF EXISTS {$database}';", $output, $return1);
exec("mysql -u{$username} -p{$password} -e 'CREATE DATABASE IF NOT EXISTS {$database}';", $output, $return2);
exec("mysql -u{$username} -p{$password} {$database} < ./database/mysql/{$database}.sql", $output, $return3);

if ($return1 or $return2 or $return3) {
    $this->fatal('An error occured');
    return;
}

$this->success("Database {$database} seeded successfully");
