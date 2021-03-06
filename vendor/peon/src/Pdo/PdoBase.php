<?php

namespace Peon\Pdo;

use PDO;
use Peon\Config;

class PdoBase extends MysqlPdo
{
    /**
     * The PDO Instance
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create A New PDO
     *
     * @param  string  $dsn
     * @param  string  $user
     * @param  string  $pass
     * @return void
     */
    public function __construct($dsn = null, $user = null, $pass = null)
    {
        extract($this->credentials($dsn, $user, $pass));

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Get The Default Connection Credentials
     *
     * @return array
     */
    protected function credentials($dsn, $user, $pass)
    {
        if (is_null($dsn)) {
            extract($this->getDefaultCredentials());
        }

        return array(
            'dsn' => $dsn,
            'user' => $user,
            'pass' => $pass,
        );
    }

    /**
     * Get The PDO Instance
     *
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Get The Default Database Credentials
     *
     * @return array
     */
    private function getDefaultCredentials()
    {
        $database = Config::pull('database');

        return $database['connections'][$database['default']];
    }
}
