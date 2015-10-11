<?php
namespace App\Controllers;

/**
 * The Page Controller
 */
class PageController extends Controller
{
    /**
     * Home Page
     *
     * @return void
     */
    public function home()
    {
        return view('page/home', array(
            'dynamic_heading' => 'Dynamic Heading',
            'shared' => $this->shared,
        ));
    }

    /**
     * Concepts Page
     *
     * @return void
     */
    public function concepts()
    {
        return view('page/concepts');
    }

    /**
     * Helpers Page
     *
     * @return void
     */
    public function helpers()
    {
        return view('page/helpers');
    }

    /**
     * Requirements Page
     *
     * @return void
     */
    public function requirements()
    {
        return view('page/requirements');
    }

}
