<?php

namespace App\Model;

class AlbumManager extends AbstractManager
{
    public const TABLE = 'album';

    public function insert(array $album): int
    {
        $statement = $this->pdo->prepare(" INSERT INTO " . self::TABLE . " (`name`,`prix`,`stock`,`description`)
         VALUES (:name,:prix,:stock,:description)");
        $statement->bindValue('name', $album['name'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $album['prix'], \PDO::PARAM_INT);
        $statement->bindValue('stock', $album['stock'], \PDO::PARAM_INT);
        $statement->bindValue('description', $album['description'], \PDO::PARAM_STR);



        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $album): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name`=:name, `prix`=:prix, `stock`=
        :stock, `description`=:description WHERE id=:id");
        $statement->bindValue('id', $album['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $album['name'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $album['prix'], \PDO::PARAM_INT);
        $statement->bindValue('stock', $album['stock'], \PDO::PARAM_INT);
        $statement->bindValue('description', $album['description'], \PDO::PARAM_STR);


        return $statement->execute();
    }
}
