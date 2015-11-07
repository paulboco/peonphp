<?php

namespace Peon;

use Closure;
use Exception;

abstract class Container
{
    /**
     * The Registered Bindings
     *
     * @var array
     */
    protected static $bindings;

    /**
     * Return An Instance Of A Class
     *
     * @param  string  $className
     * @param  array  $params
     * @return mixed
     */
    public function make($className, $params = array())
    {
        if ($this->has($className)) {
            return $this->callClass($className, $params);
        } else {
            throw new Exception("No class found with the name '{$className}'.", 1);
        }
    }

    /**
     * Register A Binding
     *
     * @param  string  $className
     * @param  Closure  $closure
     * @return void
     */
    public function register($className, Closure $closure)
    {
        self::$bindings[$className] = $closure;
    }

    /**
     * Register The Configured Bindings
     *
     * @return void
     */
    public function registerBindings($bindings)
    {
        self::$bindings = $bindings;
    }

    /**
     * Check If A Binding Has Been Registered
     *
     * @param  string  $className
     * @return bool
     */
    public function has($className)
    {
        return array_key_exists($className, self::$bindings);
    }

    /**
     * Call A Class
     *
     * @param  string  $className
     * @param  array  $params
     * @return mixed
     */
    private function callClass($className, $params = array())
    {
        return call_user_func_array(self::$bindings[$className], $params);
    }

    /**
     * Magic Method To Call A Registered Binding
     *
     * @param  string  $property
     * @return object
     */

    public function __get($property)
    {
        if (array_key_exists($property, self::$bindings)) {
            return call_user_func(self::$bindings[$property]);
        }
    }
}
