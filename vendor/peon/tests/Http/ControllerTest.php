<?php

namespace Peon\Http;

use PeonTestCase;

class TestController extends Controller
{
    public function getApp()
    {
        return $this->app;
    }
}

class ControllerTest extends PeonTestCase
{
    public function test_controller_has_app_as_a_member_variable()
    {
        $controller = new TestController();

        $this->assertInstanceOf('Peon\Application\App', $controller->getApp());
    }
}
