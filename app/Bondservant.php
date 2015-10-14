<?php

namespace App;

use PDO;

class Bondservant
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        //
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