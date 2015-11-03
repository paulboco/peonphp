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
        extract($this->connection());

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Get The Default Connection
     *
     * @return array
     */
    protected function connection()
    {
        $database = App::getInstance()
            ->make('config')
            ->get('database');

        return $database['connections'][$database['default']];
    }
}
