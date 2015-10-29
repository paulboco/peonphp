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
        parent::__construct();

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            dd($this->config->get('database.connections.mysql'));
            $this->pdo = App::getInstance()->make('pdo', array(
                'dsn' => 'dsn string',
                'user' => getenv('DB_USER'),
                'pass' => getenv('DB_PASS'),
            ));
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
}