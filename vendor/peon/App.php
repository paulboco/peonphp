<?php

namespace Peon;

class App extends Container
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
    public $rootPath;

    /**
     * Set The Application's Root Path
     *
     * @param  string  $path
     */
    public function setRootPath($path)
    {
        $this->rootPath = $path;
    }

    /**
     * Get the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
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
d($this);
        if ( ! self::$instance instanceof Peon\App) {
            self::$instance = $this;
        }
dd($this);
    }
}
