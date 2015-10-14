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
        dd('Bondservant::index()', $rows);
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