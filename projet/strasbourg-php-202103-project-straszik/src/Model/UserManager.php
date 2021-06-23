<?php

namespace App\Model;

use App\Controller\UserController;

class UserManager extends AbstractManager
{
    //création d'une fonction qui check si l'utilisateur est logué
    public const TABLE = 'user';
    // ici array user car on vaa chercher dans la table de $user s'il est deja inscrit
    public function checkingLogin(array $user)
    {
        $statement = $this->pdo->prepare(' SELECT * FROM user ' . self::TABLE . ' WHERE mail=:mail AND pass=:pass ');
        //ici on va changer les marqueurs ( placeholder)
        $statement->bindValue(':mail', $user['mail'], \PDO::PARAM_STR);
        $statement->bindValue(':pass', $user['pass'], \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }
    // function register pour insérer un user dans la table de donnée ( fonction liée avec user controller-> addUser)
    public function insert(array $user): int
    {
        $statement = $this->pdo->prepare(' INSERT INTO ' . self::TABLE . '(`name`,`lastname`,`mail`,`pass`,`age`)
        VALUES (:name,:lastname,:mail,:pass,:age)');
        $statement->bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $user['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('mail', $user['mail'], \PDO::PARAM_STR);
        $statement->bindValue('pass', $user['pass'], \PDO::PARAM_STR);
        $statement->bindValue('age', $user['age'], \PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $user): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name`=:name,`lastname`=:lastname,
        `mail`=:mail,`pass`=:pass,`age`=:age WHERE id=:id");
        $statement->bindValue('id', $user['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $user['name'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $user['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('mail', $user['mail'], \PDO::PARAM_STR);
        $statement->bindValue('pass', $user['pass'], \PDO::PARAM_STR);
        $statement->bindValue('age', $user['age'], \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function checkUserIfUse()
    {
        $statement = $this->pdo->query("SELECT mail FROM " . self::TABLE . " WHERE mail = '" . $_POST['mail'] . "'");
        $result = $statement->fetch();
        if ($result >= '1') {
            $_COOKIE = 'error101';
        }
        return $_COOKIE;
    }
}
