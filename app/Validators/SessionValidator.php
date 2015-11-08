<?php

namespace App\Validators;

use Peon\Validation\Validator;

class SessionValidator extends Validator
{
    protected $rules = array(
        'username' => 'required',
        'password' => 'required',
    );
}