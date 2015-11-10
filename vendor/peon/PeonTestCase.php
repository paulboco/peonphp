<?php

class PeonTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Load Container
     *
     * @return void
     */
    protected function loadContainer()
    {
        $container = new Peon\Container;
        $container->registerBindings(
            $this->getBindings()
        );
    }

    protected function getBindings()
    {
        return require __DIR__ . '/../../config/bindings.php';
    }
}

function dt()
{
    array_map(function ($x) {
        var_dump($x);
        echo PHP_EOL;
    }, func_get_args());
}

function ddt()
{
    array_map(function ($x) {
        var_dump($x);
        echo PHP_EOL;
    }, func_get_args());
    die;
}