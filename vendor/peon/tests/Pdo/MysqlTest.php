<?php

namespace Peon\Pdo;

use PDO;
use PeonTestCase;

class User extends PdoBase
{
    protected $table = 'users';
}

class MysqlTest extends PeonTestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = $this->getUser();
    }

    public function tearDown()
    {
        $this->user = $this->getUser();

        $this->user->deleteWhere(array('username', '=', 'kaylee'));
        $this->user->replaceInto(array(
            'id' => 1,
            'username' => 'asdf',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ));

        $pdo = $this->user->getPdo();
        $pdo->query('ALTER TABLE users AUTO_INCREMENT=3;');
    }

    public function test_is_connected()
    {
        $result = $this->user->isConnected();

        $this->assertTrue($result);
    }

    public function test_close_connection()
    {
        $this->user->closeConnection();

        $this->assertNull($this->user->getPdo());
    }

    public function test_can_get_all()
    {
        $result = $this->user->all();

        $this->assertEquals(array(
            array(
                'id' => '1',
                'username' => 'asdf',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '1',
                'deleted' => '0',
            ),
            array(
                'id' => '2',
                'username' => 'qwer',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '10',
                'deleted' => '0',
            ),
        ), $result);
    }

    public function test_can_get_all_with_deleted()
    {
        $result = $this->user->all(true);

        $this->assertEquals(array(
            array(
                'id' => '1',
                'username' => 'asdf',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '1',
                'deleted' => '0',
            ),
            array(
                'id' => '2',
                'username' => 'qwer',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '10',
                'deleted' => '0',
            ),
        ), $result);
    }

    public function test_can_find_by_id()
    {
        $result = $this->user->findById(1);

        $this->assertEquals(array(
            'id' => '1',
            'username' => 'asdf',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ), $result);
    }

    public function test_can_find_by_id_with_deleted()
    {
        $result = $this->user->findById(1, true);

        $this->assertEquals(array(
            'id' => '1',
            'username' => 'asdf',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ), $result);
    }

    public function test_can_insert()
    {
        $result = $this->user->insert(array(
            'username' => 'kaylee',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '100',
            'deleted' => '0',
        ));

        $this->assertEquals(3, $result);
    }

    public function test_can_update()
    {
        $result = $this->user->update(1, array(
            'username' => 'boc',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ));

        $this->assertEquals(1, $result);
    }

    public function test_can_replace_into()
    {
        $result = $this->user->replaceInto(array(
            'id' => 1,
            'username' => 'boc',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ));

        $this->assertEquals(3, $result);
    }

    public function test_can_delete()
    {
        $result = $this->user->delete(1);

        $this->assertEquals(1, $result);
    }

    private function getUser()
    {
        return new User(
            $GLOBALS['DB_DSN'],
            $GLOBALS['DB_USER'],
            $GLOBALS['DB_PASS']
        );
    }
}
