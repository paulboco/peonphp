<?php

namespace Peon;

use Closure;
use Exception;

abstract class Container
{
    /**
     * The Registered Services (Classes)
     *
     * @var array
     */
    protected $services = array();

    /**
     * Register Configured Services
     *
     * @return void
     */
    public function registerServices()
    {
        $this->services = include './../config/services.php';
    }

    /**
     * Return An Instance Of A Class
     *
     * @param  string  $className
     * @return mixed
     */
    public function make($className)
    {
        $className = strtolower($className);

        if ($this->has($className)) {
            return call_user_func($this->services[$className]);
        } else {
            throw new Exception("No class found with the name '{$className}'.", 1);
        }

        static::$instance = $this;
    }

    /**
     * Register A Service
     *
     * @param  string  $className
     * @param  Closure  $closure
     * @return void
     */
    public function register($className, Closure $closure)
    {
        $className = strtolower($className);

        // if($this->containerHas($className)) {
        //     throw new Exception("Class is already registered!", 1);
        // }

        $this->services[$className] = $closure;
    }

    /**
     * Check If A Service Has Been Registered
     *
     * @param  string  $className
     * @return bool
     */
    public function has($className)
    {
        return array_key_exists($className, $this->services);
    }
}
