<?php

namespace Peon\Http;

use PeonTestCase;

class ResponseTest extends PeonTestCase
{
    public function setUp()
    {
        if (!defined('PEON_START')) {
            define('PEON_START', microtime(true));
        }

        $stub = $this->getViewMock();
        $this->response = new Response($stub);
    }

    public function test_send_a_string_response()
    {
        $this->expectOutputString('foo');

        $this->response->send('foo');
    }

    public function test_send_a_closure_response()
    {
        $this->expectOutputString('closure');

        $closure = function () {
            echo 'closure';
        };

        $this->response->send($closure);
    }

    public function test_can_send_a_404_response()
    {
        $response = $this->response->send404();

        $this->assertRegExp('/test view ran in [0-9]+\.[0-9]+ms/', $response);
    }

    public function test_can_send_a_503_response()
    {
        $response = $this->response->send503();

        $this->assertRegExp('/test view ran in [0-9]+\.[0-9]+ms/', $response);
    }

    private function getViewMock()
    {
        $stub = $this->getMockBuilder('Peon\View')
                     ->getMock();

        $stub->method('make')
             ->willReturn('test view ran in %%EXECUTION_TIME%%ms');

        return $stub;
    }
}
