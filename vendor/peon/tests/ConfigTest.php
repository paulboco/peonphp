<?php

namespace Peon;

use PHPUnit_Framework_TestCase;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function test_a_single_config_variable_can_be_pulled()
    {
        $debug = Config::pull('app.debug');

        $this->assertEquals($debug, true);
    }

    public function test_an_array_config_variables_can_be_pulled()
    {
        $app = Config::pull('app');

        $this->assertInternalType('array', $app);
        $this->assertArrayHasKey('name', $app);
    }

    public function test_an_unset_config_variable_pulls_the_default()
    {
        $foo = Config::pull('foo', 'bar');

        $this->assertEquals($foo, 'bar');
    }

    public function test_an_unset_config_variable_gets_the_default()
    {
        $foo = Config::pull('foo.bar', 'baz');

        $this->assertEquals($foo, 'baz');
    }

    public function test_to_get_a_config_array()
    {
        $database = Config::pull('database.connections');

        $this->assertTrue(is_array($database));
    }

    public function test_fails_to_get_a_config_value_from_an_array()
    {
        $user = Config::pull('database.connections.foo');

        $this->assertTrue(is_null($user));
    }
}
