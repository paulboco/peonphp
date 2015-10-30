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
}
