<?php

namespace Peon;

use PDO;

class Gopher
{
    /**
     * The PDO instance
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create new gopher
     *
     * @return void
     */
    function __construct()
    {
        $this->pdo = App::getInstance()->make('pdo');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Get all rows
     *
     * @return array
     */
    public function getAll()
    {
        $statement = $this->pdo->prepare("select * from `{$this->table}`");
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Find a row
     *
     * @param  integer  $id
     * @return array
     */
    public function find($id)
    {
        $statement = $this->pdo->prepare("select * from `{$this->table}` where id=:id");
        $statement->execute(array('id' => $id));

        return $statement->fetch();
    }
}