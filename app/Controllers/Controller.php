<?php
namespace App\Controllers;

/**
 * The Base Controller
 */
abstract class Controller
{

    /**
     * The Value
     *
     * @var string
     */
    protected $shared;

    /**
     * Create a new controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->shared = 'I am a value that can be shared with classes that extend me.';
    }

}
