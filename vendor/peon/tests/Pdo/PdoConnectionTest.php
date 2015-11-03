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
        $connection = new MysqlPdo();
        // $serverName = 'www.google.com';
        // $this->assertTrue($connObj->connectToServer($serverName) !== false);
    }
}
