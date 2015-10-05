<?php

namespace Peon;

use PDO;
use Config;

/**
* PDO Wrapper
*/
class Gopher
{
    /**
     * The Database Connection
     *
     * @var PDO
     */
    protected $connection;

    /**
     * The Count
     *
     * @var integer
     */
    protected $count;

    /**
     * Create a new gopher
     *
     * @return void
     */
    function __construct()
    {
        if (is_null($this->connection)) {
            $this->connect(
                $type = Config::DB_TYPE,
                $host = Config::DB_HOST,
                $name = Config::DB_NAME,
                $charset = Config::DB_CHAR,
                $username = Config::DB_USER,
                $password = Config::DB_PASS);
        }
    }

    /**
     * Connect To The Database
     *
     * @param  string  $type
     * @param  string  $host
     * @param  string  $name
     * @param  string  $char
     * @param  string  $user
     * @param  string  $pass
     * @return void
     */
    public function connect($type, $host, $name, $char, $user, $pass)
    {
        $connectionString = sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $type, $host, $name, $char);

        $this->connection = new PDO($connectionString, $user, $pass);
    }

    /**
     * Get All Rows
     *
     * @param  string  $table
     * @return array
     */
    public function getAll($table)
    {
        $statement = $this->connection->prepare("SELECT * FROM {$table}");
        $statement->execute();
        $this->count = $statement->rowCount();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find By ID
     *
     * @param  string  $table
     * @param  integer $id
     * @return array
     */
    public function findById($table, $id)
    {
        $statement = $this->connection->prepare(
            "SELECT * FROM {$table} WHERE id=?");

        $statement->execute(array($id));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Table Import
     *
     * @param  string  $table
     * @return void
     */
    public function import($table)
    {
        $rows = include("./../database/seeds/{$table}.php");

        foreach ($rows as $row) {
            $statement = $this->connection->prepare(
                "INSERT INTO {$table} (id, name) VALUES (?, ?)");

            $statement->execute(array($row['id'], $row['name']));
        }
    }


}
