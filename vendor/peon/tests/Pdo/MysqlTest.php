<?php

namespace Peon\Pdo;

use PDO;
use Peon\App;
use PHPUnit_Framework_TestCase;

class MysqlTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        if (session_id() == '') {
            session_start();
        }

        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $user->deleteWhere(array('username', '=', 'kaylee'));
        $user->replaceInto(array(
            'id' => 1,
            'username' => 'paulboco',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ));

        $pdo = $user->getPdo();
        $pdo->query('ALTER TABLE users AUTO_INCREMENT=3;');
    }

    public function test_is_connected()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->isConnected();

        $this->assertTrue($result);
    }

    public function test_close_connection()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $user->closeConnection();

        $this->assertNull($user->getPdo());
    }

    public function test_can_get_all()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->all();

        $this->assertEquals(array(
            array(
                'id' => '1',
                'username' => 'paulboco',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '1',
                'deleted' => '0',
            ),
            array(
                'id' => '2',
                'username' => 'jayne',
                'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
                'level' => '10',
                'deleted' => '0',
            ),
        ), $result);
    }

    // public function test_can_get_all_with_deleted()
    // {
    //     $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

    //     $result = $user->all(true);

    //     $this->assertEquals(array(
    //         array(
    //             'id' => '1',
    //             'username' => 'paulboco',
    //             'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
    //             'level' => '1',
    //             'deleted' => '0',
    //         ),
    //         array(
    //             'id' => '2',
    //             'username' => 'jayne',
    //             'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
    //             'level' => '10',
    //             'deleted' => '0',
    //         ),
    //     ), $result);
    // }

    public function test_can_find_by_id()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->findById(1);

        $this->assertEquals(array(
            'id' => '1',
            'username' => 'paulboco',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ), $result);
    }

    public function test_can_insert()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->insert(array(
            'username' => 'kaylee',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '100',
            'deleted' => '0',
        ));

        $this->assertEquals(3, $result);
    }

    public function test_can_update()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->update(1, array(
            'username' => 'boc',
            'password' => '$2y$10$aSTwU9CMyqulKDDKhrjANuxggmPa/t7n5pJY.4ljFsDncReR.azUO',
            'level' => '1',
            'deleted' => '0',
        ));

        $this->assertEquals(1, $result);
    }

    public function test_can_replace_into()
    {
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->replaceInto(array(
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
        $user = new User($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

        $result = $user->delete(1);

        $this->assertEquals(1, $result);
    }
}

class User extends PdoBase
{
    protected $table = 'users';
}
