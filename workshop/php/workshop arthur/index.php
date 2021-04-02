<?php
require_once './create.php';


$allStory = $pdo->query("SELECT * FROM story")->fetchAll();







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <h2>title</h2>
    <input type="text" name="title">
    <h2>content</h2>
    <textarea name="content"></textarea>
    <h2>author</h2>
    <input type="text" name="author">
    <button type="submit" name="submit" value="submit">Submit</button>
    </form>
</body>
</html>