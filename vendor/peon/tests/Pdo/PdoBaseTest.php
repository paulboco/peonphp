<?php

namespace Peon\Pdo;

use PHPUnit_Framework_TestCase;

class PdoConnectionTest extends PHPUnit_Framework_TestCase
{
    public function test_connection_is_valid()
    {
        $dsn = 'mysql:host=localhost';
        $user = 'root';
        $pass = 'root';

        $connection = new PdoBase($dsn, $user, $pass);

        $this->assertInstanceOf('PDO', $connection->getPdo());
    }
}
