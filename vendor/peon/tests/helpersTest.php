<?php

// use PHPUnit_Framework_TestCase;
use Peon\App;

class helpersTest extends PHPUnit_Framework_TestCase
{
    public function test_config_function_returns_a_value()
    {
        $app = new App;
        $app->registerBindings();

        $dsn = config('database.connections.mysql.dsn');

        $this->assertEquals($dsn, 'mysql:host=localhost;dbname=peon');
    }
}
