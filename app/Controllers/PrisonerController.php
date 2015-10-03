<?php

namespace App\Controllers;

/**
* Prisoner Controller
*/
class PrisonerController extends Controller
{
    /**
     * Intake Form
     */
    public function intakeForm() {
        $prisoner = new \App\Prisoner;
        $data = $prisoner->getAll();

        view('prisoner/intake_form', $data);
    }

    /**
     * Store Intake Form
     */
    public function store()
    {
        // save the intake form

        redirect('prisoner/identification/param1');
    }

    /**
     * Show Identification
     */
    public function identification()
    {
        $args = func_get_args();
dd($args);
    }


}
