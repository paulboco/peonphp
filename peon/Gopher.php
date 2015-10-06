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
     * The Configuration Instance
     *
     * @var Peon\Config
     */
    protected $config;

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
    public function __construct()
    {
        $this->config = new Config;
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
     * Update By ID
     *
     * @param  string  $table
     * @param  integer $id
     * @param  array  $data
     * @return array
     */
    public function updateById($table, $id, $data)
    {
        $sql = "UPDATE :table
                SET name = :name,
                    rating = :rating
                WHERE id = :id";

        $statement = $this->connection->prepare($sql);

        return $statement->execute(array(
            'table' => $table,
            'name' => $name,
            'rating' => $rating,
            'id' => $id
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Import Table
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

    /**
     * Get A Connection's Configuration
     *
     * @param  string  $connection
     * @return array
     */
    protected function getConnection($connection = null)
    {
        $connection = $connection ?: $this->config->get('database.default', $connection);

        return $this->config->get("database.connections.{$connection}");
    }


}
