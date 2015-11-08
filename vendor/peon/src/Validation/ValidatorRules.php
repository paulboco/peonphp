<?php

namespace Peon\Validation;

class ValidatorRules
{
    /**
     * Rule: Required
     *
     * @param  string  $key
     * @param  string  $value
     * @return string|null
     */
    protected function required($key, $value)
    {
        return empty($value) ? "The {$key} field is required." : null;
    }

    /**
     * Rule: numeric
     *
     * @param  string  $key
     * @param  string  $value
     * @return string|null
     */
    protected function numeric($key, $value)
    {
        return is_numeric($value) ? null : "The {$key} field must be numeric.";
    }

    /**
     * Rule: alpha
     *
     * @param  string  $key
     * @param  string  $value
     * @return string|null
     */
    protected function alpha($key, $value)
    {
        return ctype_alpha($value) ? null : "The {$key} field must contain only letters.";
    }
}
