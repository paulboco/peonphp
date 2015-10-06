<?php

namespace Peon;

use PDO;
use Peon\Config;

class Connector
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
        extract($this->getConfig($connection));

        $connectionString = sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $type, $host, $name, $char);

        $this->connection = new PDO($connectionString, $user, $pass);

        return $this->connection;
    }

    /**
     * Get The PDO Connection
     *
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection ?: $this->connect();
    }
    /**
     * Get The Connection's Configuration
     *
     * @param  string  $connection
     * @return array
     */
    protected function getConfig($connection = null)
    {
        $connection = $connection ?: $this->config->get('database.default', $connection);

        return $this->config->get("database.connections.{$connection}");
    }


}
