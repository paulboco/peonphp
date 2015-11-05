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
    protected $bindings;

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
            return $this->resolve($className, $params);
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
        $this->bindings[$className] = $closure;
    }

    /**
     * Register The Configured Bindings
     *
     * @return void
     */
    public function registerBindings()
    {
        $this->bindings = include './../config/bindings.php';
    }

    /**
     * Resolve The Class
     *
     * @param  string  $className
     * @param  array  $params
     * @return mixed
     */
    private function resolve($className, $params = array())
    {
        return call_user_func_array($this->bindings[$className], $params);
    }

    /**
     * Check If A Binding Has Been Registered
     *
     * @param  string  $className
     * @return bool
     */
    private function has($className)
    {
        return array_key_exists($className, $this->bindings);
    }
}
