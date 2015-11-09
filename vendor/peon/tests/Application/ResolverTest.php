<?php

namespace Peon\Application;

use Peon\View;
use PHPUnit_Framework_TestCase;

class ResolverTest extends PHPUnit_Framework_TestCase
{
    public function test_can_resolve_a_class()
    {
        $resolver = new Resolver;

        $foo = $resolver->resolve('Peon\Application\ResolverFoo');

        $this->assertInstanceOf('Peon\Application\ResolverFoo', $foo);
        $this->assertInstanceOf('Peon\Application\ResolverBar', $foo->bar);
    }

    public function test_throws_exception_on_interface()
    {
        $this->setExpectedException('Exception');
        $resolver = new Resolver;

        $fail = $resolver->resolve('Peon\Application\ResolverFail');
    }

    public function test_can_resolve_a_default_value()
    {
        $resolver = new Resolver;

        $default = $resolver->resolve('Peon\Application\ResolverDefault');

        $this->assertInstanceOf('Peon\Application\ResolverDefault', $default);
        $this->assertEquals('bar', $default->default);
    }

    public function test_exception_when_no_default_value()
    {
        $this->setExpectedException('Exception');
        $resolver = new Resolver;

        $default = $resolver->resolve('Peon\Application\ResolverUnknown');
    }
}

class ResolverBar
{
    public $baz;
    public function __construct(ResolverBaz $baz)
    {
        $this->baz = $baz;
    }
}

class ResolverBaz
{}

class ResolverFoo
{
    public $bar;
    public function __construct(ResolverBar $bar)
    {
        $this->bar = $bar;
    }
}

class ResolverFail
{
    public $interface;
    public function __construct(ResolverInterface $interface)
    {
        $this->interface = $interface;
    }
}

interface ResolverInterface
{}

class ResolverDefault
{
    public $default;
    public function __construct($default = 'bar')
    {
        $this->default = $default;
    }
}

class ResolverUnknown
{
    public $default;
    public function __construct($default)
    {
        $this->default = $default;
    }
}
