<?php

namespace Peon\Application;

use PeonTestCase;
use Peon\Application\Container as BaseContainer;

class Cont extends BaseContainer
{}

class Bar
{}

class ContainerTest extends PeonTestCase
{
    protected $container;

    public function setUp()
    {
        $this->container = new Cont;
    }

    public function test_container_can_register_a_class()
    {
        $this->container->register('bar', function () {
            return new Bar;
        });

        $this->assertTrue($this->container->has('bar'));
    }

    public function test_container_can_resolve_a_class()
    {
        $this->container->register('bar', function () {
            return new Bar;
        });

        $object = $this->container->make('bar');

        $this->assertInstanceOf('Peon\Application\Bar', $object);
    }

    public function test_container_throws_exception_when_a_class_can_not_be_resolved()
    {
        $this->setExpectedException('Exception');

        $this->container->register('bar', function () {
            return new Bar;
        });

        $object = $this->container->make('baz');
    }

    public function test_container_can_register_configured_bindings()
    {
        $this->container->registerBindings($this->getBindings());

        $object = $this->container->make('request');

        $this->assertTrue($this->container->has('request'));
        $this->assertInstanceOf('Peon\Http\Request', $object);
    }

    public function test_magic_getter_can_get_an_object()
    {
        $this->loadContainer();

        $request = $this->container->request;

        $this->assertInstanceOf('Peon\Http\Request', $request);
    }

    public function test_magic_getter_returns_null_on_unregistered_binding()
    {
        $this->loadContainer();

        $foo = $this->container->foo;

        $this->assertNull($foo);
    }
}
