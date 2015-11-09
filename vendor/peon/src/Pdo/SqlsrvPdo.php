<?php

namespace Peon\Pdo;

use PDO;
use Peon\Auth;
use Peon\Application\App;

abstract class SqlsrvPdo
{
    protected $dsn;

    /**
     * Is PDO Connected?
     *
     * @return boolean
     */
    public function isConnected()
    {
        return $this->pdo instanceof PDO;
    }

    /**
     * Close PDO
     *
     * @return void
     */
    public function closeConnection()
    {
        $this->pdo = null;
    }

    /**
     * Get All Rows
     *
     * @param  boolean  $includeDeleted
     * @return array
     */
    public function all($includeDeleted = false)
    {
        $where = $this->whereDeleted($includeDeleted);

        $statement = $this->pdo->query(
            "SELECT * FROM {$this->table}{$where}"
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find By ID
     *
     * @param  integer  $id
     * @param  boolean  $includeDeleted
     * @return array
     */
    public function findById($id, $includeDeleted = false)
    {
        $andWhere = $this->andDeleted($includeDeleted);

        $statement = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE id=:id{$andWhere}"
        );

        $statement->execute(array(
            'id' => $id,
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insert A New Row
     *
     * @param  array  $data
     * @return integer
     */
    public function insert($data)
    {
        $names = implode(',', array_keys($data));
        $values = implode(',', array_map(function ($v) {
            return ':' . $v;
        }, array_keys($data)));

        $statement = $this->pdo->prepare(
            "INSERT INTO {$this->table} ({$names}) VALUES ($values)"
        );

        $statement->execute($data);

        return (integer) $this->pdo->lastInsertId();
    }

    /**
     * Update By ID
     *
     * @param  integer  $id
     * @param  array  $data
     * @return boolean
     */
    public function update($id, $data)
    {
        $data = array_filter($data, function($v) {
            return !is_null($v);
        });

        $pairs = array_map(function ($key) {
            return "{$key}=:{$key}";
        }, array_keys($data));

        $pairs = implode(', ', $pairs);

        $statement = $this->pdo->prepare(
            "UPDATE {$this->table} SET {$pairs} WHERE id=:id"
        );

        return $statement->execute($data + array('id' => $id));
    }

    /**
     * Replace Values
     *
     * @param  array  $values
     * @return boolean
     */
    public function replaceInto($values)
    {
        $id = array_shift($values);
        $keys = ':' . implode(', :', array_keys($values));

        $this->deleteWhere(array('id', '=', $id));
        $rval = $this->insert(array('id' => $id) + $values);
    }

    /**
     * Delete Where
     *
     * @param  array  $where
     * @return boolean
     */
    public function deleteWhere($where)
    {
        $statement = $this->pdo->prepare(
            "DELETE FROM {$this->table} WHERE {$where[0]} {$where[1]} :{$where[0]}"
        );

        return $statement->execute(array(
            $where[0] => $where[2],
        ));
    }

    /**
     * Delete By ID
     *
     * @param  integer  $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->deleteWhere(array('id', '=', $id));
    }

    /**
     * Build Where Deleted Clause For Super User
     *
     * @param  boolean  $includeDeleted
     * @return string
     */
    protected function whereDeleted($includeDeleted = false)
    {
        if ($includeDeleted) {
            return Auth::level(Auth::SUPER) ? '' : ' WHERE deleted=0';
        }
    }

    /**
     * Build And Clause For Deleted Column
     *
     * @param  boolean  $includeDeleted
     * @return string
     */
    protected function andDeleted($includeDeleted = false)
    {
        if ($where = $this->whereDeleted($includeDeleted)) {
            return str_replace('WHERE', 'AND', $where);
        }
    }

    /**
     * Find By Username
     *
     * @param  string  $username
     * @return array
     */
    public function findByUsername($username)
    {
        $statement = $this->pdo->prepare(
            "SELECT TOP 1 * FROM {$this->table} WHERE username=:username"
        );

        $statement->execute(array(
            'username' => $username,
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
