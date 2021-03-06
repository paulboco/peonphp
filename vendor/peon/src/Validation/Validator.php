<?php

namespace Peon\Validation;

use Peon\Http\Request;
use Peon\Session\Session;

class Validator extends ValidatorRules
{
    /**
     * The Request Instance
     *
     * @var Peon\Http\Request
     */
    protected $request;

    /**
     * The Session Instance
     *
     * @var Peon\Session\Session
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
     * @return void
     */
    protected function validate()
    {
        foreach ($this->rules as $key => $rule) {
            if (isset($this->input[$key]) and $error = $this->$rule($key, $this->input[$key])) {
                $this->errors[$key] = $error;
            }
        }

        if ($this->errors) {
            $this->session->setFlash('alerts.danger', 'Errors were found in your form submission.');
            $this->session->setFlash('errors', $this->errors());
            $this->session->setFlash('old_input', $this->input);
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
