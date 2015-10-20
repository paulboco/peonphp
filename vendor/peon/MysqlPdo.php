<?php

namespace Peon;

use PDO;

class MysqlPdo
{
    private $pdo;
    private $error;

    public function __construct()
    {
        $this->pdo = App::make('pdo');

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
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

    public function findById($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(
            'id' => $id
        ));

        return $statement->fetch();
    }

    public function replaceValues($values)
    {
        $keys = ':' . implode(', :', array_keys($values));
        $sql = "REPLACE INTO `{$this->table}` VALUES ({$keys})";

        $statement = $this->pdo->prepare($sql);

        return $statement->execute($values);
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
