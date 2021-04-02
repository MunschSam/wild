<?php
require_once 'config.php';
require __DIR__.'/src/models/recipe-model.php';
// Input GET parameter validation (integer >0)
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
if (false === $id || null === $id) {
    header("Location: /");
    exit("Wrong input parameter");
}
$recipe = getRecipeById($id);
// Fetching a recipe from database -  assuming the database is okay
$connection = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
$query = 'SELECT title, description FROM recipe WHERE id=:id';
$statement = $connection->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$recipe = $statement->fetch(PDO::FETCH_ASSOC);

// Database result check
if (!isset($recipe['title']) || !isset($recipe['description'])) {
    header("Location: /");
    exit("Recipe not found");
}
require __DIR__.'/src/views/show.php';
// Generate the web page
?>

