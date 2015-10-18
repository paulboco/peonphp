<?php

namespace App\Validators;

use Peon\Validator;

class SessionValidator extends Validator
{
    protected $rules = array(
        'username' => 'required',
        'password' => 'required',
    );
}