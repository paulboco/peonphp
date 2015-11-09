<?php

namespace Peon\Application;

use PHPUnit_Framework_TestCase;

class ContainerTest extends PHPUnit_Framework_TestCase
{
    public function test_container_can_bind_a_class()
    {
        $container = new Foo;

        $container->register('bar', function () {
            return new Bar;
        });

        $this->assertTrue($container->has('bar'));
    }

    public function test_container_can_resolve_a_class()
    {
        $container = new Foo;

        $container->register('bar', function () {
            return new Bar;
        });
        $object = $container->make('bar');

        $this->assertInstanceOf('Peon\Application\Bar', $object);
    }

    public function test_container_throws_exception_when_a_class_can_not_be_resolved()
    {
        $this->setExpectedException('Exception');

        $container = new Foo;

        $container->register('bar', function () {
            return new Bar;
        });
        $object = $container->make('baz');
    }

    public function test_container_can_register_configured_bindings()
    {
        $container = new Foo;

        $container->registerBindings(require __DIR__ . '/../../../config/bindings.php');
        $object = $container->make('request');

        $this->assertTrue($container->has('request'));
        $this->assertInstanceOf('Peon\Http\Request', $object);
    }

    public function test_magic_getter_can_get_an_object()
    {
        $container = new Foo;

        $container->registerBindings(require __DIR__ . '/../../../config/bindings.php');
        $request = $container->request;

        $this->assertInstanceOf('Peon\Http\Request', $request);
    }

    public function test_magic_getter_returns_null_on_unregistered_binding()
    {
        $container = new Foo;

        $container->registerBindings(require __DIR__ . '/../../../config/bindings.php');
        $foo = $container->foo;

        $this->assertNull($foo);
    }
}

class Foo extends Container
{}

class Bar
{}
