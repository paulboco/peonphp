<?php

namespace App\Controllers;

/**
* The Base Controller
*/
abstract class Controller {

    /**
     * The Value
     *
     * @var string
     */
    protected $value;


    /**
     * Create a new controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->value = 'I am a value that can be shared with classes that extend me.';
    }


}
