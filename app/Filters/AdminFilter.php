<?php

namespace App\Filters;

use Peon\Routing\RouteFilter;

class AdminFilter extends RouteFilter
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

        if ($this->auth->user()->level > 10) {
            $this->response->send404();
        }
    }
}
