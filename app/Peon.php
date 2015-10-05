<?php

namespace App;

use Peon\Gopher;

class Peon extends Gopher
{
    /**
     * Create a new peon
     *
     * @return void
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Get All Peons
     *
     * @return array
     */
    public function all() {
        return $this->getAll('peons');
    }

    /**
     * Get Count
     *
     * @return integer
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * Find By ID
     *
     * @param  integer  $id
     * @return array
     */
    public function find($id) {
        return $this->findById('peons', $id);
    }

    /**
     * Seed The peons Table
     *
     * @return void
     */
    public function seedDb()
    {
        $this->import('peons');
    }


}