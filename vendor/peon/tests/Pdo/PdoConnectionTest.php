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
        // test to ensure that the object from an fsockopen is valid
        $connection = new PdoBase();
        // $serverName = 'www.google.com';
        // $this->assertTrue($connObj->connectToServer($serverName) !== false);
    }
}
