<?php

namespace App\Controllers;

use App\User;
use App\Validators\SessionValidator;
use Peon\Request;
use Peon\Response;
use Peon\Session;
use Peon\View;

class SessionController
{
    /**
     * The Session
     *
     * @var Peon\Session
     */
    protected $session;

    /**
     * The Validator Instance
     *
     * @var Peon\Validator
     */
    protected $validator;

    /**
     * The Response Instance
     *
     * @var Peon\Response
     */
    protected $response;

    /**
     * The Request Instance
     *
     * @var Peon\Request
     */
    protected $request;

    /**
     * The View Instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * Create a new session controller
     *
     * @param  Session  $session
     * @param  SessionValidator  $validator
     * @param  Response  $response
     * @param  View  $view
     * @return void
     */
    public function __construct(
        Session $session,
        SessionValidator $validator,
        Response $response,
        Request $request,
        View $view
    )
    {
        $this->session = $session;
        $this->validator = $validator;
        $this->response = $response;
        $this->request = $request;
        $this->view = $view;
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
        // redirect back to the form if validation fails
        if ($this->validator->fails()) {
            $this->response->redirect('session/create');
        }

        // session authenticated
        $this->session->set('authenticated', true);

        // flash success message and redirect to index
        $this->session->setFlash('success', "You are now logged in.");
        $this->response->redirect('page/home');
    }

    /**
     * Destroy
     *
     * @return void
     */
    public function destroy()
    {
        // rescind authentication
        $this->session->forget('authenticated');

        // flash success message and redirect to index
        $this->session->setFlash('success', "You are now logged out.");
        $this->response->redirect('/');
    }
}
