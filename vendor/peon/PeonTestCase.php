<?php

class PeonTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * The Project Root Path
     *
     * @var string
     */
    protected $projectRoot;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectRoot = realpath(__DIR__ . '/../../');
    }

    /**
     * Get The Project Root Path
     *
     * @return string
     */
    public function projectRoot()
    {
        return $this->projectRoot;
    }

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

    /**
     * Get The Configured Bindings
     *
     * @return array
     */
    protected function getBindings()    {
        return require __DIR__ . '/../../config/bindings.php';
    }
}

/*
|--------------------------------------------------------------------------
| Test Helper Functions
|--------------------------------------------------------------------------
*/

if (!function_exists('dt')) {
    function dt()
    {
        array_map(function ($x) {
            var_dump($x);
            echo PHP_EOL;
        }, func_get_args());
    }
}

if (!function_exists('ddt')) {
    function ddt()
    {
        array_map(function ($x) {
            var_dump($x);
            echo PHP_EOL;
        }, func_get_args());
        die;
    }
}
