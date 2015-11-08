<?php

namespace App\Filters;

use Peon\Auth;
use Peon\Response;
use Peon\Routing\RouteFilter;

class AuthFilter extends RouteFilter
{
    /**
     * Run The Filter
     *
     * @return void
     */
    public function run()
    {
        if (!$this->auth->check()) {
            $this->response->send404();
        }
    }
}
