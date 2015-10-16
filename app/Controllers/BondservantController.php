<?php

namespace App\Controllers;

use App\Bondservant;
use App\Validators\BondservantValidator;
use Peon\Config;
use Peon\Response;
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
     * @param  Config  $config
     * @param  View  $view
     * @return void
     */
    public function __construct(Bondservant $bondservant, BondservantValidator $validator, Response $response, Config $config, View $view) {
        $this->bondservant = $bondservant;
        $this->validator = $validator;
        $this->response = $response;
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
            'errors' => flash('errors'),
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
            flash('danger', 'Errors were found in your form submission.');
            flash('errors', $this->validator->errors());
            $this->response->redirect('bondservant/edit/' . $id);
        }

        flash('success', "Bondservant #{$id} was successfully updated.");
        $this->response->redirect('bondservant/index');
    }
}
