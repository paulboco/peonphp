<?php

namespace App\Models;

use PDO;
use Peon\Pdo\PdoBase;

class User extends PdoBase
{
    /**
     * The Users Table Name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Find By Username
     *
     * @param  string  $username
     * @return array
     */
    public function findByUsername($username)
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM {$this->table} WHERE username=:username LIMIT 1"
        );

        $statement->execute(array(
            'username' => $username,
        ));

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
