<?php

namespace App;

use Peon\Gopher;

class Prisoner extends Gopher
{
    public function all() {
        return $this->getAll('prisoners');
    }

    public function find($id) {
        return $this->findById('prisoners', $id);
    }


}