<?php

namespace App;

use Peon\Gopher;

class Peon extends Gopher
{
    /**
     * Get All Peons
     */
    public function all() {
        return $this->getAll('peons');
    }

    public function count()
    {
        return $this->count;
    }

    public function find($id) {
        return $this->findById('peons', $id);
    }

    public function seedDb()
    {
        $this->import('peons');
    }

}