<?php

namespace App\Validators;

use Peon\Validation\Validator;

class BondservantValidator extends Validator
{
    protected $rules = array(
        'name' => 'required',
        'rating' => 'numeric',
        'deleted' => 'numeric',
    );
}