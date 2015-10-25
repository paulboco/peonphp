<?php

namespace App\Controllers;

use App\Models\Bondservant;
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
     * @return View
     */
    public function index()
    {
        return $this->view->make('bondservant/index', array(
            'rows' => $this->bondservant->all(true),
        ));
    }

    /**
     * Create
     *
     * @return View
     */
    public function create()
    {
        // show the create form
        return $this->view->make('bondservant/create', array(
            'ratings' => $this->config->get('lists/rating'),
        ));
    }

    /**
     * Store
     *
     * @return Response
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
        $this->flashMessage($result, $result);
        return $this->response->redirect('bondservant/index');
    }

    /**
     * Edit
     *
     * @param  integer  $id
     * @return View
     */
    public function edit($id)
    {
        if (!$row = $this->bondservant->findById($id, true)) {
            return $this->response->redirect('bondservant/index');
        }

        // show the edit form
        return $this->view->make('bondservant/edit', array(
            'row' => $row,
            'ratings' => $this->config->get('lists/rating'),
            'no_yes' => $this->config->get('lists/no_yes'),
        ));
    }

    /**
     * Update
     *
     * @param  integer  $id
     * @return Response
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
            'deleted' => $this->request->get('deleted'),
        ));

        // flash message and redirect to index
        $this->flashMessage($result, $id);
        return $this->response->redirect('bondservant/index');
    }

    /**
     * Destroy
     *
     * @param  integer  $id
     * @return Response
     */
    public function destroy($id)
    {
        // update the database
        $result = $this->bondservant->update($id, array(
            'deleted' => 1,
        ));

        // flash message and redirect to index
        $this->flashMessage($result, $id);
        return $this->response->redirect('bondservant/index');
    }
}
