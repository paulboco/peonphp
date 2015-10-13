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
     * Private constructor
     */
    private function __construct()
    {
    }

   public static function instance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new UserFactory();
        }
        return $inst;
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
     * Get the globally available instance of the container.
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
     * Register Configured Services
     *
     * @return void
     */
    public function registerServices()
    {
        parent::registerServices();
    }
}
