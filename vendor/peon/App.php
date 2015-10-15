<?php

namespace Peon;

final class App extends Container
{
    /**
     * The App Instance
     *
     * @var Peon\App
     */
    private static $instance;

    /**
     * The Application's Root Path
     */
    protected $rootPath;

    /**
     * The Resolver
     *
     * @var Geary\Resolver
     */
    public $resolver;

    /**
     * Private constructor
     */
    private function __construct()
    {
    }

    /**
     * Get App Instance
     *
     * @return static
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Set The Application's Root Path
     *
     * @param  string  $path
     * @return void
     */
    public function setRootPath($path)
    {
        $this->rootPath = $path;
    }

    /**
     * Get The Application's Root Path
     *
     * @return string
     */
    public function getRootPath()
    {
        return $this->rootPath;
    }

    /**
     * Set the resolver
     *
     * @param Geary\Resolver
     * @return void
     */
    public function setResolver($resolver)
    {
        $this->resolver = $resolver;
    }
}
