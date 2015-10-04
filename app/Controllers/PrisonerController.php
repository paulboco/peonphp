<?php

namespace App\Controllers;

/**
* Prisoner Controller
*/
class PrisonerController extends Controller
{
    /**
     * Index
     */
    public function index() {

        $prisoner = new \App\Prisoner;
$prisoner->seedDb();

        $rows = $prisoner->all();
dd($rows);
        view('prisoner/index');
    }

    /**
     * Create
     */
    public function create() {}

    /**
     * Store
     */
    public function store()
    {
        redirect('prisoner/index/id');
    }

    /**
     * Show
     */
    public function show($id) {}

    /**
     * Edit
     */
    public function edit($id) {}

    /**
     * Update
     */
    public function update($id) {}

    /**
     * Destroy
     */
    public function destroy($id) {}


}
