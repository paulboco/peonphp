<?php

namespace Peon;

class App extends Container
{
    public $basePath;

    public function __construct()
    {
        parent::__construct();
    }

    public function setPath($basePath)
    {
        $this->basePath = $basePath;
    }
}
