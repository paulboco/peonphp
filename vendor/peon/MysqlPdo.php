<?php

namespace Peon;

use PDO;

class MysqlPdo
{
    private $pdo;
    private $error;

    public function __construct()
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $this->pdo = App::getInstance()->make('pdo');
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function isConnected()
    {
        return is_null($this->pdo);
    }

    public function closeConnection()
    {
        $this->pdo = null;
        return $this->isConnected();
    }

    public function all()
    {
        $sql = "SELECT * FROM `{$this->table}`";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            'id' => $id
        ));

        return $statement->fetch();
    }

    public function updateById($id, $values)
    {
        $pairs = array_map(function($key) {
            return "{$key}=:{$key}";
        }, array_keys($values));

        $pairs = implode(', ', $pairs);

        $sql = "UPDATE `{$this->table}` SET {$pairs} WHERE id=:id";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute($values + array('id' => $id));
    }

    public function replaceValues($values)
    {
        $keys = ':' . implode(', :', array_keys($values));
        $sql = "REPLACE INTO `{$this->table}` VALUES ({$keys})";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute($values);
    }

    public function deleteWhere($where)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE {$where[0]} {$where[1]} :{$where[0]}";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute(array(
            $where[0] => $where[2]
        ));
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE id = :id";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute(array(
            'id' => $id
        ));
    }
}
