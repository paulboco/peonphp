<?php

namespace App\Controllers;

use App\Peon;
use Peon\Validation;

/**
* Peon Controller
*/
class PeonController extends Controller
{
    /**
     * The Peon Instance
     *
     * @var App\Peon
     */
    protected $peon;


    /**
     * Create new peon controller
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->peon = new Peon;
    }

    /**
     * Index
     */
    public function index($id = null) {
        view('peon/index', array(
            'rows' => $this->peon->all(),
            'count' => $this->peon->count(),
            'id' => $id,
        ));
    }

    /**
     * Create
     */
    public function create() {
        view('peon/create', array(
            'ratings' => config('selects/peon_ratings'),
        ));
    }

    /**
     * Store
     */
    public function store()
    {
        redirect('peon/index/id');
    }

    /**
     * Show
     */
    public function show($id) {}

    /**
     * Edit
     */
    public function edit($id) {
        view('peon/edit', array(
            'row' => $this->peon->find($id),
            'ratings' => config('selects/peon_ratings'),
            'errors' => array('name' => 'Name can not be blank'),
        ));
    }

    /**
     * Update
     */
    public function update($id) {
        $this->peon->update($id, request());

        redirect("peon/index/{$id}", array('errors' => $errors));
    }

    /**
     * Destroy
     */
    public function destroy($id) {}


}
