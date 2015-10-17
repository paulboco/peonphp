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
     * The Session Instance
     *
     * @var Session
     */
    protected $session;

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
     * @return void
     */
    public function __construct(Request $request, Session $session)
    {
        $this->input = $request->all();
        $this->session = $session;
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
        $this->session->flash('old_input', $this->input);

        foreach ($this->rules as $key => $rule) {
            if ($error = $this->$rule(
                    $key,
                    $this->input[$key]
            )) {
                $this->errors[$key] = $error;
            }
        }

        if ($this->errors) {
            $this->session->flash('danger', 'Errors were found in your form submission.');
            $this->session->flash('errors', $this->errors());
            $this->session->flash('old_input', $this->input);
        }

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
