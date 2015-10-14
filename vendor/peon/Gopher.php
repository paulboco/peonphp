<?php

namespace Peon;

use PDO;

class Gopher
{
    protected $pdo;

    function __construct()
    {
        $this->pdo = App::getInstance()->make('pdo');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $statement = $this->pdo->prepare("select * from `{$this->table}`");
        $statement->execute();
        return $statement->fetchAll();
    }
}