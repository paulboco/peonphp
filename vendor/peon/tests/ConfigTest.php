<?php

namespace Peon;

use PeonTestCase;

class ConfigTest extends PeonTestCase
{
    public function test_a_single_config_variable_can_be_pulled()
    {
        $debug = Config::pull('app.debug');

        $this->assertEquals($debug, true);
    }

    public function test_an_array_of_config_variables_can_be_pulled()
    {
        $app = Config::pull('app');

        $this->assertInternalType('array', $app);
        $this->assertArrayHasKey('name', $app);
    }

    public function test_pulling_an_unset_config_variable_returns_the_default()
    {
        $foo = Config::pull('foo', 'bar');

        $this->assertEquals($foo, 'bar');
    }

    public function test_pulling_an_unset_config_variable_under_an_existing_key_returns_the_default()
    {
        $foo = Config::pull('app.foo', 'bar');

        $this->assertEquals($foo, 'bar');
    }
}
