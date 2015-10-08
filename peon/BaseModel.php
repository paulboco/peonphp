<?php

namespace Peon;

use FluentPDO;
use Peon\Connector;

class BaseModel
{
    protected $fluent;


    /**
     * Create a new peon
     *
     * @return void
     */
    public function __construct()
    {
        $connector = new Connector();

        $this->fluent = new FluentPDO($connector->connect());
    }


}