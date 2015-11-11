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

if (!function_exists('d')) {
    function d()
    {
        array_map(function ($x) {
            var_dump($x);
            echo PHP_EOL;
        }, func_get_args());
    }
}

if (!function_exists('dd')) {
    function dd()
    {
        array_map(function ($x) {
            var_dump($x);
            echo PHP_EOL;
        }, func_get_args());
        die;
    }
}
