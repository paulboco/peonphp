<?php

namespace Peon\Pdo;

use PDO;
use Peon\App;

class PdoBase extends MysqlPdo
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
        $dbConfig = $this->getConfig();
        $dsn = $this->buildDsn($dbConfig);

        try {
            $this->pdo = App::getInstance()->make('pdo', array(
                'dsn' => $dsn,
                'user' => $dbConfig['user'],
                'pass' => $dbConfig['pass'],
                'options' => $dbConfig['options'],
            ));
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Get Database Configuration
     *
     * @return array
     */
    public function getConfig()
    {
        $config = App::getInstance()->make('config');
        $default = $config->get('database.default');

        return $config->get('database.connections.' . $default);
    }

    /**
     * Build DSN String
     *
     * @param  array  $dbConfig
     * @return string
     */
    public function buildDsn($dbConfig)
    {
        $search = array('%host%', '%name%');
        $replace = array($dbConfig['host'], $dbConfig['name']);

        return str_replace($search, $replace, $dbConfig['dsn']);
    }
}
