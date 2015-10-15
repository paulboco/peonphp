<?php

namespace App;

use PDO;
use Peon\Gopher;

class Bondservant extends Gopher
{
    /**
     * The table name
     *
     * @var string
     */
    protected $table = 'bondservants';

    /**
     * Index
     *
     * @return array
     */
    public function index()
    {
        return $this->getAll();
    }

    /**
     * Show
     *
     * @param  integer  $id
     * @return array
     */
    public function show($id)
    {
        return $this->find($id);
    }

    public function create($name, $rating)
    {
        //
    }

    public function update($id, $name, $rating)
    {
        //
    }
}