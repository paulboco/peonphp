<?php

namespace App\Controllers;

use App\Bondservant;
use App\Validators\BondservantValidator;
use Peon\Config;
use Peon\Request;
use Peon\Response;
use Peon\Session;
use Peon\View;

class BondservantController
{
    /**
     * The Bondservant
     *
     * @var App\Bondservant
     */
    protected $bondservant;

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
     * The Session Instance
     *
     * @var Peon\Session
     */
    protected $session;

    /**
     * The Config Instance
     *
     * @var Peon\Config
     */
    protected $config;

    /**
     * The View Instance
     *
     * @var Peon\View
     */
    protected $view;

    /**
     * Create a new bondservant controller
     *
     * @param  Bondservant  $bondservant
     * @param  Validator  $validator
     * @param  Response  $response
     * @param  Session  $session
     * @param  Config  $config
     * @param  View  $view
     * @return void
     */
    public function __construct(Bondservant $bondservant, BondservantValidator $validator, Response $response, Request $request, Session $session, Config $config, View $view)
    {
        $this->bondservant = $bondservant;
        $this->validator = $validator;
        $this->response = $response;
        $this->request = $request;
        $this->session = $session;
        $this->config = $config;
        $this->view = $view;
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $this->view->make('bondservant/index', array(
            'rows' => $this->bondservant->all(),
        ));
    }

    /**
     * Edit
     *
     * @param  integer  $id
     * @return void
     */
    public function edit($id)
    {
        // show the edit form
        $this->view->make('bondservant/edit', array(
            'row' => $this->bondservant->find($id),
            'ratings' => $this->config->get('selects/rating'),
            'errors' => $this->session->flash('errors'),
        ));
    }

    /**
     * Update
     *
     * @param  integer  $id
     * @return void
     */
    public function update($id)
    {
        // redirect back to the form if validation fails
        if ($this->validator->fails()) {
            $this->response->redirect('bondservant/edit/' . $id);
        }

        // update the database
        $this->bondservant->update($id, array(
            'name' => $this->request->get('name'),
            'rating' => $this->request->get('rating'),
        ));

        // flash success message and redirect to index
        $this->session->flash('success', "Bondservant #{$id} was successfully updated.");
        $this->response->redirect('bondservant/index');
    }
}
