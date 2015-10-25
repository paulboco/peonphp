<?php

namespace Peon;

use PDO;

abstract class MysqlPdo
{
    /**
     * The PDO Instance
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * The Errors Array
     *
     * @var array
     */
    private $error;

    /**
     * Create A New PDO
     *
     * @return void
     */
    public function __construct()
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $this->pdo = App::getInstance()->make('pdo');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

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
     * @return array
     */
    public function all()
    {
        $where = Auth::level(Auth::SUPER) ? '' : 'WHERE `deleted` = 0';

        $statement = $this->pdo->query(
            "SELECT * FROM `{$this->table}`{$where}"
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find By ID
     *
     * @param  integer  $id
     * @return array
     */
    public function findById($id)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM `{$this->table}` WHERE id=:id"
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
        $values = implode(',', array_map(function($v) {
            return ':' . $v;
        }, array_keys($data)));

        $statement = $this->pdo->prepare(
            "INSERT INTO `{$this->table}` ({$names}) VALUES ($values)"
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
        $pairs = array_map(function ($key) {
            return "{$key}=:{$key}";
        }, array_keys($data));

        $pairs = implode(', ', $pairs);

        $statement = $this->pdo->prepare(
            "UPDATE `{$this->table}` SET {$pairs} WHERE id=:id"
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
        $keys = ':' . implode(', :', array_keys($values));

        $statement = $this->pdo->prepare(
            "REPLACE INTO `{$this->table}` VALUES ({$keys})"
        );

        return $statement->execute($values);
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
            "DELETE FROM `{$this->table}` WHERE {$where[0]} {$where[1]} :{$where[0]}"
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
        $statement = $this->pdo->prepare(
            "DELETE FROM `{$this->table}` WHERE id = :id"
        );

        return $statement->execute(array(
            'id' => $id,
        ));
    }
}
