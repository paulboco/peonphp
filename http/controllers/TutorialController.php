<?php

/**
* Tutorial Controller
*/
class TutorialController
{
    public function foreachLoop() {
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
