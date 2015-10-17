<?php

namespace App\Validators;

use Peon\Validator;

class UserValidator extends Validator
{
    protected $rules = array(
        'username' => 'required',
        'password' => 'required',
    );
}