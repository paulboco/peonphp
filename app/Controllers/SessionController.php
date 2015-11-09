<?php

namespace App\Controllers;

use App\Validators\SessionValidator;
use Peon\Auth;
use Peon\Http\Controller;

class SessionController extends Controller
{
    /**
     * The Auth Instance
     *
     * @var Peon\Auth;
     */
    protected $auth;

    /**
     * The Validator Instance
     *
     * @var Peon\Validation\Validator
     */
    protected $validator;

    /**
     * Create a new session controller
     *
     * @param  SessionValidator  $validator
     * @param  Auth  $auth
     * @return void
     */
    public function __construct(SessionValidator $validator, Auth $auth)
    {
        parent::__construct();

        $this->validator = $validator;
        $this->auth = $auth;
    }

    /**
     * Create
     *
     * @return void
     */
    public function create()
    {
        return $this->app->view->make('session/create');
    }

    /**
     * Store
     *
     * @return void
     */
    public function store()
    {
        if ($this->validator->fails()) {
            return $this->app->response->redirect('session/create');
        }

        if ($this->auth->attempt($this->app->request->all())) {
            return $this->app->response->redirect('page/home');
        }

        $this->app->alert->flash('danger', "Your credentials could not be verified.");

        return $this->app->response->redirect('session/create');
    }

    /**
     * Destroy
     *
     * @return void
     */
    public function destroy()
    {
        $this->auth->logout();

        return $this->app->response->redirect();
    }
}
