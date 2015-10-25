<?php

namespace App\Models;

use PDO;
use Peon\MysqlPdo;

class User extends MysqlPdo
{
    /**
     * The Users Table Name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Create A New SessionHandler
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find By Username
     *
     * @param  string  $username
     * @return array
     */
    public function findByUsername($username)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM `{$this->table}` WHERE username=:username LIMIT 1"
        );

        $statement->execute(array(
            'username' => $username,
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Write Session ID To User
     *
     * @param  integer  $userId
     * @param  string  $sessionId
     * @return void
     */
    public function writeSessionId($userId, $sessionId)
    {
        $this->update($userId, array('session_id' => $sessionId));
    }
}
