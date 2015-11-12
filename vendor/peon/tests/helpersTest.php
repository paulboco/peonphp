<?php

class helpersTest extends PeonTestCase
{
    public function setUp()
    {
        include __DIR__ . '/../src/helpers.php';
    }

    public function test_that_config_works()
    {
        $this->loadContainer();

        $dsn = config('database.connections.mysql.dsn');

        $this->assertEquals($dsn, 'mysql:host=localhost;dbname=peon');
    }

    public function test_that_d_works()
    {
        $this->expectOutputString("<pre>string(4) \"test\"\n</pre>");

        echo d('test');
    }

    public function test_that_e_works()
    {
        $this->expectOutputString('&lt;code&gt;test&lt;/code&gt;');

        echo e('<code>test</code>');
    }

    public function test_that_path_works()
    {
        $this->assertEquals(path(), realpath(__DIR__ . '/../../../'));
    }

    public function test_that_activate_if_works()
    {
        $this->assertEquals('active', activate_if(1, ''));
    }

    public function test_that_activate_if_works_with_default()
    {
        $this->assertEquals('default', activate_if(1, '', 'default'));
    }

    public function test_that_activate_if_returns_negative_result()
    {
        $this->assertEquals(null, activate_if(1, 'foo'));
    }
}
