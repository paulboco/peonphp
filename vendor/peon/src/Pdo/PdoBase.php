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
     * Create A New PDO
     *
     * @param  string  $dsn
     * @param  string  $user
     * @param  string  $pass
     * @return void
     */
    public function __construct($dsn = null, $user = null, $pass = null)
    {
        if (is_null($dsn)) {
            extract($this->connection());
        }
var_dump(get_defined_vars());
        $this->pdo = new PDO($dsn, $user, $pass);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Get The Default Connection
     *
     * @return array
     */
    protected function connection()
    {
        // Call the App to get the database configuration
        $database = App::getInstance()
            ->make('config')
            ->get('database');

        return $database['connections'][$database['default']];
    }
}
