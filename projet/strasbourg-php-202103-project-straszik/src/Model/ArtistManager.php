<?php

namespace App\Model;

class ArtistManager extends AbstractManager
{
    public const TABLE = 'artist';

    /**
     * Insert new Artist in database
     */
    public function insert(array $artist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`,`lastname`,`age`,`presentation`) 
        VALUES (:name, :lastname, :age, :presentation)");
        $statement->bindValue('name', $artist['name'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $artist['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('age', $artist['age'], \PDO::PARAM_INT);
        $statement->bindValue('presentation', $artist['presentation'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    /**
     * Update Artist in database
     */
    public function update(array $artist): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name` = :name,`lastname` = :lastname,
        `age` = :age,`presentation` = :presentation WHERE id=:id");
        $statement->bindValue('id', $artist['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $artist['name'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $artist['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('age', $artist['age'], \PDO::PARAM_INT);
        $statement->bindValue('presentation', $artist['presentation'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
