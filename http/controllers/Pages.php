<?php

/**
* The Pages Controller
*/
class Pages
{
    /**
     * Create Pages object
     */
    function __construct()
    {
        # code...
    }

    public function home()
    {
        $items = array(
            array('id' => 1, 'name' => 'Herman Munster'),
            array('id' => 2, 'name' => 'Lilly Munster'),
            array('id' => 3, 'name' => 'Eddie Munster'),
            array('id' => 4, 'name' => 'Marilyn Munster'),
            array('id' => 4, 'name' => 'Grandpa Munster'),
        );

        require_once(path() . '/views/tutorials/foreach.php');
    }


}