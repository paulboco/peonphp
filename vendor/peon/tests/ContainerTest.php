<?php

namespace Peon;

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

        $this->assertInstanceOf('Peon\Bar', $object);
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
        $this->assertInstanceOf('Peon\Request', $object);
    }
}

class Foo extends Container
{}

class Bar
{}
