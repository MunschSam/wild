<?php

namespace App\Model;

class EventManager extends AbstractManager
{
    public const TABLE = 'event';


    /* ----------------
        INSERT event
    ------------------*/
    public function insert(array $event): int
    {
        $statement = $this->pdo->prepare(" INSERT INTO " . self::TABLE . " (`name`,`date`,`prix`,`placeRemain`,`adress`,
        `description`) VALUES (:name, :date, :prix, :placeRemain, :adress, :description)");
        $statement->bindValue('name', $event['name'], \PDO::PARAM_STR);
        $statement->bindValue('date', $event['date'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $event['prix'], \PDO::PARAM_INT);
        $statement->bindValue('placeRemain', $event['placeRemain'], \PDO::PARAM_INT);
        $statement->bindValue('adress', $event['adress'], \PDO::PARAM_STR);
        $statement->bindValue('description', $event['description'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /* ----------------
        UPDATE event
    ------------------*/
    public function update(array $event): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = :name, date = :date, prix = :prix, 
        placeRemain = :placeRemain, adress = :adress, description = :description WHERE id=:id");
        $statement->bindValue('id', $event['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $event['name'], \PDO::PARAM_STR);
        $statement->bindValue('date', $event['date'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $event['prix'], \PDO::PARAM_INT);
        $statement->bindValue('placeRemain', $event['placeRemain'], \PDO::PARAM_INT);
        $statement->bindValue('adress', $event['adress'], \PDO::PARAM_STR);
        $statement->bindValue('description', $event['description'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
