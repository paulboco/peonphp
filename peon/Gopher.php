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
    protected $db;


    /**
     * Create a new PDO wrapper
     *
     * @return void
     */
    function __construct()
    {
        if (is_null($this->db)) {
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
     */
    public function connect($type, $host, $name, $charset, $username, $password)
    {
        $connectionString = sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $type, $host, $name, $charset);

        $this->db = new PDO($connectionString, $username, $password);
    }

    public function getAll($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$table}");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($table, $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE id=?");
        $stmt->execute(array($id));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
