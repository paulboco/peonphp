<?php

namespace Peon;

use PDO;
use Peon\Config;

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
        /**
         * @todo not sure i need this if statement
         */
        // if (is_null($this->connection))
        // {
        //     $this->connect(
        //         $config->get("database.connections.{$default}.type"),
        //         $config->get("database.connections.{$default}.host"),
        //         $config->get("database.connections.{$default}.name"),
        //         $config->get("database.connections.{$default}.char"),
        //         $config->get("database.connections.{$default}.user"),
        //         $config->get("database.connections.{$default}.pass")
        //     );
        // }
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
    public function connect($connection = null)
    {
        extract($this->getConnection($connection));

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

    protected function getConnection($connection = null)
    {
        $config = new Config;

        $connection = $connection ?: $config->get('database.default', $connection);

        return $config->get("database.connections.{$connection}");
    }


}
