<?php
require_once './connect.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livecoding</title>
</head>
<body>
    <?php
    // Insertion
    if(isset($_POST['validation']) && $_POST['validation']<>''){
        $result = $pdo->exec("INSERT INTO user VALUES(null,'".$_POST['name']."','".$_POST['description']."','".$_POST['date']."')");
          if($result){
              echo '<h4>Insertion réussie</h4>';
          }else{
              echo '<h4>Insertion non réussie</h4>';
          }
    }

    // Suppression
    if(isset($_GET['type']) && $_GET['type']=='del' && $_GET['id']<>''){
        $result = $pdo->exec("DELETE FROM user WHERE id=".$_GET['id']);
        if($result){
            echo '<h4>Suppression réussie</h4>';
        }else{
            echo '<h4>Suppression non réussie</h4>';
        }
    }elseif(isset($_GET['type']) && $_GET['type']=='ed' && $_GET['id']<>''){

        if(isset($_POST['type']) && $_POST['type']=='ed' && $_POST['id']<>'') {
            $result = $pdo->exec("UPDATE user SET name='".$_POST['name']."', description='".$_POST['description']."', date='".$_POST['date']."' WHERE id=".$_POST['id']);
            if($result){
                echo '<h4>Modification réussie</h4>';
            }else{
                echo '<h4>Modification non réussie</h4>';
            }
        }

        $result = $pdo->query("SELECT * FROM user WHERE id=".$_GET['id'])->fetch();
        ?>

        <h2>Modifier utilisateur</h2>
        <form method="post">
            <input type="text" name="name" value="<?php echo $result['name']; ?>" /><br/>
            <textarea name="description" rows="10" cols="10"><?php echo $result['description']; ?></textarea>
            <input type="date" name="date" value="<?php echo $result['date']; ?>">
            <input type="hidden" name="type" value="ed">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <button type="submit" name="modifier" value="modifier">Modifier</button>
        </form>
        <?php

    }
    // Modification
    ?>

<?php
if(@$_GET['type']!='ed'){
?>
    <h2>Ajouter utilisateur</h2>
    <form method="post">
        <input type="text" name="name" /><br/>
        <textarea name="description" rows="10" cols="10"></textarea>
        <input type="date" name="date">
        <button type="submit" name="validation" value="GO">GO</button>
    </form>
    <?php
}
    ?>
    <h2>Afficher les utilisateurs</h2>
    <?php
    $allUsers = $pdo->query("SELECT * FROM user")->fetchAll();
    foreach($allUsers as $user)
    {
        echo $user['name'].'---'.$user['description'].'---'.$user['date'].'--|––<a href="?type=ed&id='.$user['id'].'">ED</a> <a href="?type=del&id='.$user['id'].'">DEL</a><br/>';
    }
    ?>
</body>
</html>

