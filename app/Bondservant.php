<?php

namespace App;

use PDO;
use Peon\Gopher;

class Bondservant extends Gopher
{
    protected $table = 'bondservants';

    public function index()
    {
        $rows = $this->getAll();
        d('Bondservant::index()', $rows);
    }

    public function show($id)
    {
        $row = $this->find($id);
        d("Bondservant::show({$id})", $row);
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