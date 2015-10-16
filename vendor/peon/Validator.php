<?php

namespace Peon;

use Peon\Request;
use Peon\ValidatorRules;

class Validator extends ValidatorRules
{
    /**
     * The Request Instance
     *
     * @var Request
     */
    protected $request;

    /**
     * The Errors Array
     *
     * @var array
     */
    protected $errors = array();

    /**
     * Create A New Validator
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->input = $request->all();
    }

    /**
     * Check That Validation Passes
     *
     * @return boolean
     */
    public function passes()
    {
        return $this->validate();
    }

    /**
     * Check That Validation Fails
     *
     * @return boolean
     */
    public function fails()
    {
        return !$this->passes();
    }

    /**
     * Validate The Request
     *
     * @todo we're only applying one rule per key at this point
     * @todo store errors in the session
     * @return void
     */
    protected function validate()
    {
        foreach ($this->rules as $key => $rule) {
            if ($error = $this->$rule($key, $this->input[$key])) {
                $this->errors[$key] = $error;
            }
        }

        // SESSION FLASH ERRORS HERE

        return empty($this->errors);
    }

    /**
     * Get Errors
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}
