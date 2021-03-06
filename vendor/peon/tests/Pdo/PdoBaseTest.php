<?php

namespace Peon\Pdo;

use Peon\Application\App;
use PeonTestCase;

class PdoConnectionTest extends PeonTestCase
{
    public function test_connection_with_parameters()
    {
        $dsn = 'mysql:host=localhost';
        $user = 'root';
        $pass = 'root';

        $pdo = new PdoBase($dsn, $user, $pass);

        $this->assertInstanceOf('PDO', $pdo->getPdo());
    }

    public function test_connection_without_parameters()
    {
        require App::getRootPath() . '/.env';

        $pdo = new PdoBase();

        $this->assertInstanceOf('PDO', $pdo->getPdo());
    }
}
