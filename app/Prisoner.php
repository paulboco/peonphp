<?php

namespace App;

use Peon\Gopher;

class Prisoner extends Gopher
{
    /**
     * Get All Prisoners
     */
    public function all() {
        return $this->getAll('prisoners');
    }

    public function find($id) {
        return $this->findById('prisoners', $id);
    }

    public function seedDb()
    {
        $this->import('prisoners');
    }

}