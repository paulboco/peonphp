<?php

namespace App\Http\Controllers;

/**
* Framework Controller
*/
class FrameworkController extends Controller
{
    /**
     * Framework Home Page
     */
    public function home()
    {
        view('/views/framework/home.tpl');
    }

    /**
     * Foreach Loop
     */
    public function foreachLoop() {
        $items = array('items' => array(
            array('id' => 1, 'name' => 'Herman Munster'),
            array('id' => 2, 'name' => 'Lilly Munster'),
            array('id' => 3, 'name' => 'Eddie Munster'),
            array('id' => 4, 'name' => 'Marilyn Munster'),
            array('id' => 4, 'name' => 'Grandpa Munster'),
        ));

        view('/views/framework/foreach.tpl', $items);
    }


}
