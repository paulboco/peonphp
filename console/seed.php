<?php

if ($argc < 1) {
    $this->fatal('Not enough arguments');
}

if ($argc > 1) {
    $this->fatal('Too many arguments');
}

if (!extension_loaded('mysql')) {
    $this->fatal('MySql is not loaded');
}

exec('mysql -uroot -proot -e "DROP DATABASE IF EXISTS peon";', $output, $return1);
exec('mysql -uroot -proot -e "CREATE DATABASE IF NOT EXISTS peon";', $output, $return2);
exec('mysql -uroot -proot peon < ./database/mysql/peon.sql', $output, $return3);

if ($return1 or $return2 or $return3) {
    $this->fatal('An error occured');
}

$this->success('Database peon seeded successfully');
