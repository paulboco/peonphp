<?php

namespace Peon\Application;

use Peon\View;
use PeonTestCase;

class ResolverTest extends PeonTestCase
{
    public function setUp()
    {
        $this->resolver = new Resolver;
    }

    public function test_can_resolve_a_class()
    {
        $foo = $this->resolver->resolve('Peon\Application\ResolverFoo');

        $this->assertInstanceOf('Peon\Application\ResolverFoo', $foo);
        $this->assertInstanceOf('Peon\Application\ResolverBar', $foo->bar);
    }

    public function test_throws_exception_on_interface()
    {
        $this->setExpectedException('Exception');

        $fail = $this->resolver->resolve('Peon\Application\ResolverFail');
    }

    public function test_can_resolve_a_default_value()
    {
        $default = $this->resolver->resolve('Peon\Application\ResolverDefault');

        $this->assertInstanceOf('Peon\Application\ResolverDefault', $default);
        $this->assertEquals('bar', $default->default);
    }

    public function test_exception_when_no_default_value()
    {
        $this->setExpectedException('Exception');

        $default = $this->resolver->resolve('Peon\Application\ResolverUnknown');
    }
}

/*
|--------------------------------------------------------------------------
| Test Classes
|--------------------------------------------------------------------------
*/

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
