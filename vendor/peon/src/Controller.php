<?php

namespace Peon;

class Controller
{
    /**
     * The view instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * The request instance
     *
     * @var Peon\Request
     */
    protected $request;

    /**
     * The response instance
     *
     * @var Peon\Response
     */
    protected $response;

    /**
     * The session instance
     *
     * @var Peon\Session
     */
    protected $session;

    /**
     * The config instance
     *
     * @var Peon\Config
     */
    protected $config;

    /**
     * Create A New Controller
     */
    public function __construct()
    {
        $app = App::getInstance();

        $this->view = $app->make('view');
        $this->request = $app->make('request');
        $this->response = $app->make('response');
        $this->session = $app->make('session');
        $this->config = $app->make('config');
    }

    /**
     * Flash Message To The Session
     *
     * @param  boolean  $result
     * @param  integer  $id
     * @return void
     */
    public function flashMessage($result, $id = null)
    {
        $translations = array(
            'store' => 'create',
            'update' => 'update',
            'destroy' => 'delete',
        );

        $segments = explode('/', $_SERVER['REQUEST_URI']);
        $name = ucfirst($segments['1']);

        $backtrace = debug_backtrace();
        $method = $backtrace[1]['function'];
        $action = $translations[$method];

        if ($result) {
            $this->session->setFlash('success', "{$name} #{$id} was successfully {$action}d.");
        } elseif ($action == 'create') {
            $this->session->setFlash('danger', "{$name} failed to be {$action}d.");
        } else {
            $this->session->setFlash('danger', "{$name} #{$id} failed to be {$action}d.");
        }
    }
}
