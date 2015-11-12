<?php

namespace App\Filters;

use Peon\Application\App;
use Peon\Routing\RouteFilter;

class DevFilter extends RouteFilter
{
    /**
     * Run The Filter
     *
     * @return void
     */
    public function run()
    {
        $environment = App::getInstance()->environment();

        if ($environment != 'dev') {
            $this->response->send404();
        }
    }
}
