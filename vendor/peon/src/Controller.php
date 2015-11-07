<?php

namespace Peon;

class Controller
{
    /**
     * The App Instance
     *
     * @var Peon\View
     */
    protected $app;

    /**
     * Create A New Controller
     */
    public function __construct()
    {
        $this->app = App::getInstance();
    }
}
