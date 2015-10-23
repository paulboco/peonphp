<?php

namespace Peon;

use Exception;
use ReflectionClass;
use ReflectionParameter;

/**
 * Resolver
 *
 * Automatic dependency injection with PHP’s reflection API.
 */
class Resolver
{
    /**
     * Build An Instance Of The Given Class
     *
     * @param string $class
     * @return mixed
     *
     * @throws Exception
     */
    public function resolve($class)
    {
        $reflector = new ReflectionClass($class);

        if (!$reflector->isInstantiable()) {
            throw new Exception("[$class] is not instantiable");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $class;
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * Build A List Of Dependencies For A Given Method's Parameters
     *
     * @param array $parameters
     * @return array
     */
    public function getDependencies($parameters)
    {
        $dependencies = array();

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();
            $dependencies[] = $this->chooseResolver($dependency, $parameter);
        }

        return $dependencies;
    }

    /**
     * Determine What To Do With A Non-class Value
     *
     * @param ReflectionParameter $parameter
     * @return mixed
     *
     * @throws Exception
     */
    public function resolveNonClass(ReflectionParameter $parameter)
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }

        throw new Exception("Cannot bind unknown parameter.");
    }

    /**
     * Choose The Resolver
     *
     * @param  ReflectionClass  $dependency
     * @param  ReflectionParameter  $parameter
     * @return object
     * @todo Find the data types for this docblock
     */
    protected function chooseResolver($dependency, $parameter)
    {
        if (is_null($dependency)) {
            return $this->resolveNonClass($parameter);
        } else {
            return $this->resolve($dependency->name);
        }
    }
}
