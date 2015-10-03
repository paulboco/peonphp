<?php

namespace App\Http\Controllers;

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

        redirect('page/home');
    }

}

function redirect($uri) {
    header('Location: ' . "http://{$_SERVER['SERVER_NAME']}/{$uri}");
}