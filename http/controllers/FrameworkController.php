<?php

/**
* Framework Controller
*/
class FrameworkController
{
    /**
     * Framework Home Page
     */
    public function home()
    {
        require_once(path() . '/views/framework/home.tpl');
    }

    /**
     * Foreach Loop
     */
    public function foreachLoop() {
        $items = array(
            array('id' => 1, 'name' => 'Herman Munster'),
            array('id' => 2, 'name' => 'Lilly Munster'),
            array('id' => 3, 'name' => 'Eddie Munster'),
            array('id' => 4, 'name' => 'Marilyn Munster'),
            array('id' => 4, 'name' => 'Grandpa Munster'),
        );

        require_once(path() . '/views/framework/foreach.tpl');
    }


}
