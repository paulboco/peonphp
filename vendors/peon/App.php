<?php

namespace Peon;

class App extends Container
{
    public $basePath;

    public function __construct($basePath)
    {
        $this->basePath = $basePath;

        parent::__construct();
    }
}