<?php

namespace App\Filters;

use Peon\Auth;
use Peon\Filter;
use Peon\Response;

class AdminFilter extends Filter
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

        if ($this->auth->user()->level != 1) {
            $this->response->send404();
        }
    }
}
