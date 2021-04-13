<?php

// Fetching all recipes
$recipes = getAllBribes();



function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
}


function getAllBribes(): array
{
    $connection = createConnection();

    $statement = $connection->query('SELECT id,name,payment FROM bribe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipes;
}
if (isset($_POST['name']) && $_POST['name'] != " " && isset($_POST['payment']) && $_POST['payment'] != " ")

$connection = createConnection();

$query = "INSERT INTO bribe (name, payment) VALUES (:name, :payment)";
$statement = $connection->prepare($query);

$statement->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
$statement->bindValue(':payment', $_POST['payment'],\PDO::PARAM_INT);


$statement->execute();
?>