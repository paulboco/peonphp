<?php

namespace App\Controllers;

use App\Validators\SessionValidator;
use Peon\Auth;
use Peon\Controller;

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
     * @var Peon\Validator
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
        // show the login form
        $this->view->make('session/create');
    }

    /**
     * Store
     *
     * @return void
     */
    public function store()
    {
        if ($this->validator->fails()) {
            $this->response->redirect('session/create');
        }

        if ($this->auth->attempt($this->request->all())) {
            $this->response->redirect('page/home');
        }

        $this->session->setFlash('danger', "Your credentials could not be verified.");
        $this->response->redirect('session/create');
    }

    /**
     * Destroy
     *
     * @return void
     */
    public function destroy()
    {
        $this->auth->logout();

        // flash success message and redirect to index
        $this->session->setFlash('success', "You are now logged out.");
        $this->response->redirect();
    }
}
