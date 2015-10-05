<?php

namespace App\Controllers;

/**
* Peon Controller
*/
class PeonController extends Controller
{
    /**
     * Index
     */
    public function index($id = null) {
        $peon = new \App\Peon;

        view('peon/index', array(
            'rows' => $peon->all(),
            'count' => $peon->count(),
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
        $peon = new \App\Peon;

        view('peon/edit', array(
            'row' => $peon->find($id),
            'ratings' => config('selects/peon_ratings'),
            'errors' => array('name' => 'Name can not be blank'),
        ));
    }

    /**
     * Update
     */
    public function update($id) {
        redirect("peon/index/{$id}");
    }

    /**
     * Destroy
     */
    public function destroy($id) {}


}
