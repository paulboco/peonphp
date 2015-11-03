<?php

namespace Peon\Pdo;

use PHPUnit_Framework_TestCase;

class PdoConnectionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {}

    public function tearDown()
    {}

    public function testConnectionIsValid()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=peon';
        $user = 'root';
        $pass = 'root';

        $connection = new PdoBase($dsn, $user, $pass);

        // $serverName = 'www.google.com';
        // $this->assertTrue($connObj->connectToServer($serverName) !== false);
    }
}
