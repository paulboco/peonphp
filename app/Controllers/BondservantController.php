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
     * @var Peon\Validation\Validator
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
        return $this->app->view->make('bondservant/index', array(
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
        return $this->app->view->make('bondservant/create', array(
            'ratings' => $this->app->config->get('lists/rating'),
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
            return $this->app->response->redirect('bondservant/create');
        }

        // insert into database
        $result = $this->bondservant->insert(array(
            'name' => $this->app->request->get('name'),
            'rating' => $this->app->request->get('rating'),
        ));

        // flash alert and redirect to index
        $this->app->alert->flash('success', "Bondservant #{$result} was successfully stored.");
        return $this->app->response->redirect('bondservant/index');
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
            return $this->app->response->redirect('bondservant/index');
        }

        // show the edit form
        return $this->app->view->make('bondservant/edit', array(
            'row' => $row,
            'ratings' => $this->app->config->get('lists/rating'),
            'no_yes' => $this->app->config->get('lists/no_yes'),
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
            return $this->app->response->redirect('bondservant/edit/' . $id);
        }

        // update the database
        $result = $this->bondservant->update($id, array(
            'name' => $this->app->request->get('name'),
            'rating' => $this->app->request->get('rating'),
            'deleted' => $this->app->request->get('deleted'),
        ));

        // flash alert and redirect to index
        $this->app->alert->flash('success', "Bondservant #{$id} was successfully updated.");
        return $this->app->response->redirect('bondservant/index');
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

        // flash alert and redirect to index
        $this->app->alert->flash('success', "Bondservant #{$id} was successfully deleted.");
        return $this->app->response->redirect('bondservant/index');
    }
}
