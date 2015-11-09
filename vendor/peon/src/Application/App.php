<?php

namespace Peon\Application;

final class App extends Container
{
    /**
     * The App Instance
     *
     * @static Peon\Application\App
     */
    private static $instance;

    /**
     * The Application's Root Path
     *
     * @static string
     */
    private static $rootPath;

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
        self::$rootPath = $path;
    }

    /**
     * Get The Application's Root Path
     *
     * @return string
     */
    public function getRootPath()
    {
        return self::$rootPath ?: realpath(__DIR__ . '/../../../../');
    }

    /**
     * Check For Maintenance Mode
     *
     * @return boolean
     */
    public function inMaintenance()
    {
        return file_exists(self::$rootPath . '/storage/app/maintenance');
    }

    /**
     * Show Maintenance Mode Page
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function showMaintenance()
    {
        $this->make('response')->send503();
    }
}
