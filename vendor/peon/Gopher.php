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
     * Create a new gopher
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
    public function all()
    {
        $statement = $this->pdo->prepare("select * from `{$this->table}`");
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * Find A Row
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

    /**
     * Update A Row
     *
     * @param  integer  $id
     * @param  array  $pairs
     * @return void
     */

    public function update($id, $pairs)
    {
        // build sets of key/value pairs to update
        $sets = '';
        foreach ($pairs as $key => $value) {
            $sets .= "`{$key}` = :{$key},";
        }

        // build the sql string
        $sql  = "update `{$this->table}` ";
        $sql .= 'set ' . rtrim($sets, ',') . ' ';
        $sql .= 'where id=:id';

        // prepare and execute
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pairs + array('id' => $id));
    }
}