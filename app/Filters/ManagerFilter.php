<?php

namespace App\Filters;

use Peon\Auth;
use Peon\Routing\RouteFilter;

class ManagerFilter extends RouteFilter
{
    /**
     * Run The Filter
     *
     * @return void
     */
    public function run()
    {
        if (!$this->auth->check() or is_null($this->auth->user()) {
            $this->response->send404();
        }

        if ($this->auth->user()->level > Auth::MANAGER) {
            $this->response->send404();
        }
    }
}
