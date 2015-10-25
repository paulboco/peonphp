<?php

namespace App\Filters;

use Peon\Filter;

class GuestFilter extends Filter
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
