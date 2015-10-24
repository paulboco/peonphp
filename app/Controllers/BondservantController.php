<?php

namespace App\Controllers;

use App\Bondservant;
use App\Validators\BondservantValidator;
use Peon\Controller;

class BondservantController extends Controller
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
     * Create a new bondservant controller
     *
     * @param  Bondservant  $bondservant
     * @param  Validator  $validator
     * @return void
     */
    public function __construct(Bondservant $bondservant, BondservantValidator $validator)
    {
        parent::__construct();

        $this->bondservant = $bondservant;
        $this->validator = $validator;
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        return $this->view->make('bondservant/index', array(
            'rows' => $this->bondservant->all(),
        ));
    }

    /**
     * Create
     *
     * @return void
     */
    public function create()
    {
        // show the create form
        return $this->view->make('bondservant/create', array(
            'ratings' => $this->config->get('selects/rating'),
        ));
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
            return $this->response->redirect('bondservant/create');
        }

        // insert into database
        $result = $this->bondservant->insert(array(
            'name' => $this->request->get('name'),
            'rating' => $this->request->get('rating'),
        ));

        // flash message and redirect to index
        if ($result) {
            $this->session->setFlash('success', "Bondservant #{$result} was successfully created.");
        } else {
            $this->session->setFlash('danger', 'Bondservant failed to be created.');
        }

        return $this->response->redirect('bondservant/index');
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
        return $this->view->make('bondservant/edit', array(
            'row' => $this->bondservant->findById($id),
            'ratings' => $this->config->get('selects/rating'),
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
            return $this->response->redirect('bondservant/edit/' . $id);
        }

        // update the database
        $result = $this->bondservant->update($id, array(
            'name' => $this->request->get('name'),
            'rating' => $this->request->get('rating'),
        ));

        // flash message and redirect to index
        if ($result) {
            $this->session->setFlash('success', "Bondservant #{$id} was successfully updated.");
        } else {
            $this->session->setFlash('danger', 'Bondservant #{$id} failed to be updated.');
        }

        return $this->response->redirect('bondservant/index');
    }
}
