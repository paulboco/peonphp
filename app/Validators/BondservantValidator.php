<?php

namespace App\Validators;

use Peon\Validator;

class BondservantValidator extends Validator
{
    protected $rules = array(
        'name' => 'required',
    );
}