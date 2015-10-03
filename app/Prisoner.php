<?php

namespace App;

use Peon\BaseModel;

class Prisoner extends BaseModel
{
    protected $data = array(
        0 => array('id' => 1, 'name' => 'Herman Munster'),
        1 => array('id' => 2, 'name' => 'Lilly Munster'),
        2 => array('id' => 3, 'name' => 'Eddie Munster'),
        3 => array('id' => 4, 'name' => 'Marilyn Munster'),
        4 => array('id' => 5, 'name' => 'Grandpa Munster'),
    );

    public function getAll() {
        return $this->data;
    }

    public function find($id) {
        foreach ($this->data as $row) {
            if ($row['id'] == $id) {
                return $row;
            }
        }
    }


}