<?php

namespace App\Controllers;

use App\Bondservant;
use App\Validators\BondservantValidator;
use Peon\Config;
use Peon\Response;
use Peon\Session;
use Peon\View;

class BondservantController {
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
    public function __construct(Bondservant $bondservant, BondservantValidator $validator, Response $response, Session $session, Config $config, View $view) {
        $this->bondservant = $bondservant;
        $this->validator = $validator;
        $this->response = $response;
        $this->session = $session;
        $this->config = $config;
        $this->view = $view;
    }

    /**
     * The index
     *
     * @return void
     */
    public function index() {
        $this->view->make('bondservant/index', array(
            'rows' => $this->bondservant->index(),
        ));
    }

    /**
     * Edit
     *
     * @param  integer  $id
     * @return void
     */
    public function edit($id) {
        $this->view->make('bondservant/edit', array(
            'row' => $this->bondservant->show($id),
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
    public function update($id) {
        if ($this->validator->fails()) {
            $this->response->redirect('bondservant/edit/' . $id);
        }

        $this->session->flash('success', "Bondservant #{$id} was successfully updated.");
        $this->response->redirect('bondservant/index');
    }
}
