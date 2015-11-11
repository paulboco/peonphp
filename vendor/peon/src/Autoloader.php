<?php

namespace Peon;

use Exception;

class Autoloader
{
    /**
     * Register The Autoloader
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * The Registered Namespaces
     *
     * @var array
     */
    protected $namespaces;

    /**
     * Register A Namespace
     *
     * @param  string  $namespace
     * @param  string  $path
     * @return void
     */
    public function registerNamespace($namespace, $path)
    {
        $this->namespaces[$namespace] = $path;
    }

    /**
     * Attempt To Load A Class
     *
     * @param  string  $class
     * @return void
     */
    private function loadClass($class)
    {
        $this->requireFile($this->getClassPath($class));
    }

    /**
     * Get The Class's Path
     *
     * @param  string  $class
     * @return string
     */
    private function getClassPath($class)
    {
        $parts = explode('\\', $class);
        $namespace = array_shift($parts);

        if (!isset($this->namespaces[$namespace])) {
            return;
        }

        $path = $this->namespaces[$namespace];

        return $path . '/' . implode('/', $parts) . '.php';
    }

    /**
     * Require The File
     *
     * @param  string  $file
     * @return boolean
     */
    private function requireFile($file)
    {
        if (file_exists($file)) {
            return require $file;
        }
    }
}
