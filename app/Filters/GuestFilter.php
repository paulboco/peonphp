<?php

namespace App\Filters;

use Peon\Routing\RouteFilter;

class GuestFilter extends RouteFilter
{
    /**
     * Run The Filter
     *
     * @return void
     */
    public function run()
    {
        if ($this->auth->check()) {
            $this->response->redirect('page/home');
        }
    }
}
