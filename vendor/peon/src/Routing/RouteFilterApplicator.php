<?php

namespace Peon\Routing;

class RouteFilterApplicator
{
    /**
     * Apply Route Filters
     *
     * @param  string  $currentController
     * @param  string  $currentMethod
     * @return void
     */
    protected function applyFilters($currentController, $currentMethod)
    {
        if (!$filters = $this->getControllerFilters($currentController)) {
            return;
        }

        $this->filterAnyMethod($filters);

        if (!$method = $this->getMethod($filters, $currentMethod)) {
            return;
        }

        $this->filterMethod($filters, $method);
    }

    /**
     * Filter A Method
     *
     * @param  array  $filters
     * @param  string  $method
     * @return void
     */
    protected function filterMethod($filters, $method)
    {
        foreach ($filters[$method] as $filter) {
            $this->callFilter($filter);
        }
    }

    /**
     * Filter Any Method
     *
     * @param  array  $filters
     * @return array|null
     */
    protected function filterAnyMethod($filters)
    {
        if (array_key_exists(':any', $filters)) {
            $this->filterMethod($filters, ':any');
        }
    }

    /**
     * Get The Method To Filter
     *
     * @param  array  $filters
     * @param  string  $currentMethod
     * @return string
     */
    protected function getMethod($filters, $currentMethod)
    {
        if (array_key_exists($currentMethod, $filters)) {
            return $currentMethod;
        }
    }

    /**
     * Call The Filter's Run Method
     *
     * @param  string  $filter
     * @return void
     */
    protected function callFilter($filter)
    {
        $className = $this->buildClassName($filter);

        call_user_func_array(array(
            $this->resolver->resolve($className),
            'run',
        ), array());
    }

    /**
     * Build Filter Class Name
     *
     * @param  string  $filter
     * @return string
     */
    protected function buildClassName($filter)
    {
        $filter = ucfirst(strtolower($filter));

        return "\\App\\Filters\\{$filter}Filter";
    }

    /**
     * Get All Filters For A Controller
     *
     * @param  string  $controller
     * @return array|null
     */
    protected function getControllerFilters($controller)
    {
        $controller = substr(strrchr($controller, "\\"), 1);

        return config("filters.{$controller}");
    }
}
