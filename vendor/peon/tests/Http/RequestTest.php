<?php

namespace Peon\Http;

use PHPUnit_Framework_TestCase;

class RequestTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $_REQUEST = array('foo' => 'bar');
    }

    public function test_all_request_variables_can_be_returned()
    {
        $request = new Request;

        $all = $request->all();

        $this->assertEquals($all, array('foo' => 'bar'));
    }

    public function test_single_request_variable_can_be_found()
    {
        $request = new Request;

        $foo = $request->get('foo');

        $this->assertEquals($foo, 'bar');
    }

    public function test_request_variable_returns_default()
    {
        $request = new Request;

        $baz = $request->get('baz', 'default');

        $this->assertEquals($baz, 'default');
    }

    public function test_for_existance_of_request_variable()
    {
        $request = new Request;

        $result = $request->has('foo');

        $this->assertTrue($result);
    }
}
