<?php

namespace Peon;

class ValidatorRules
{
    /**
     * Rule: Required
     *
     * @param  string  $value
     * @return string|null
     */
    protected function ruleRequired($value)
    {
        return empty($value) ? 'This field is required.' : null;
    }
}
