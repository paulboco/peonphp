<?php

namespace Peon;

use Peon\Request;

/**
 * The Base Controller
 */
abstract class Controller
{
    /**
     * The request instance
     *
     * @var  Peon\Request
     */
    protected $request;

    /**
     * The Value
     *
     * @var string
     */
    protected $shared;

    /**
     * Create a new controller
     *
     * @param  Peon\Request  $request
     * @return void
     * @todo Inject Request and View
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->shared = 'I am a value that can be shared with classes that extend me.';
    }

}
