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
     * Check For Maintenance Mode
     *
     * @return boolean
     */
    public function inMaintenance()
    {
        return file_exists($this->rootPath . '/storage/app/maintenance');
    }

    /**
     * Show Maintenance Mode Page
     *
     * @return void
     */
    public function showMaintenance()
    {
        $this->make('response')->send503();
    }
}
