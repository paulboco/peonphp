<?php

namespace Peon\Http;

use PeonTestCase;

class RequestTest extends PeonTestCase
{
    public function setUp()
    {
        $this->request = new Request;

        $_REQUEST = array('foo' => 'bar');
    }

    public function test_all_request_variables_can_be_returned()
    {
        $all = $this->request->all();

        $this->assertEquals($all, array('foo' => 'bar'));
    }

    public function test_single_request_variable_can_be_found()
    {
        $foo = $this->request->get('foo');

        $this->assertEquals($foo, 'bar');
    }

    public function test_request_variable_returns_default()
    {
        $baz = $this->request->get('baz', 'default');

        $this->assertEquals($baz, 'default');
    }

    public function test_for_existance_of_request_variable()
    {
        $result = $this->request->has('foo');

        $this->assertTrue($result);
    }
}
