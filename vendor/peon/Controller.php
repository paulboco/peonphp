<?php

namespace Peon;

/**
 * The Base Controller
 */
abstract class Controller
{
    /**
     * The request instance
     *
     * @var  Peon\Request
     */
    protected $request;

    /**
     * The view instance
     *
     * @var  Peon\View
     */
    protected $view;

    /**
     * Create a new controller
     *
     * @param  Peon\View  $view
     * @param  Peon\Request  $request
     * @return void
     * @todo Inject Request and View
     */
    public function __construct(View $view, Request $request)
    {
        $this->view = $view;
        $this->request = $request;
    }

}
