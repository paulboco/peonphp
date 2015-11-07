<?php

use Peon\App;

class helpersTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        include __DIR__ . '/../src/helpers.php';
    }

    public function test_config_function_returns_a_value()
    {
        $app = new App;
        $app->registerBindings(require __DIR__ . '/../../../config/bindings.php');

        $dsn = config('database.connections.mysql.dsn');

        $this->assertEquals($dsn, 'mysql:host=localhost;dbname=peon');
    }
}
