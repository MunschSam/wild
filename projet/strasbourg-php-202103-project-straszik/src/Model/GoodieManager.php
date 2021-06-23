<?php

namespace App\Model;

class GoodieManager extends AbstractManager
{
    // access to my goodie's table
    public const TABLE = 'goodie';

    // now I want to insert a new goodie in my table
    // variable $goodie is a ARRAY
    public function insert(array $goodie): int
    {
        $statement = $this->pdo->prepare(" INSERT INTO " . self::TABLE . " (`name`,`presentation`,`prix`, `stockRemain`)
         VALUES (:name,:presentation,:prix,:stockRemain)");
        $statement->bindValue('name', $goodie['name'], \PDO::PARAM_STR);
        $statement->bindValue('presentation', $goodie['presentation'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $goodie['prix'], \PDO::PARAM_INT);
        $statement->bindValue('stockRemain', $goodie['stockRemain'], \PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    // update a goodie if price change for example

    public function update(array $goodie): bool
    {
        /**
         * step 1 , prepare a command and follow with new value , so at final return result
         * for help field in table :
         * id / name / presentation / prix / stockRemain
         * */
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name`=:name,`presentation` = 
        :presentation,`prix` = :prix,`stockRemain` = :stockRemain WHERE id=:id");
        $statement->bindValue('id', $goodie['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $goodie['name'], \PDO::PARAM_STR);
        $statement->bindValue('presentation', $goodie['presentation'], \PDO::PARAM_STR);
        $statement->bindValue('prix', $goodie['prix'], \PDO::PARAM_INT);
        $statement->bindValue('stockRemain', $goodie['stockRemain'], \PDO::PARAM_INT);

        return $statement->execute();
    }
}
