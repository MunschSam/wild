<?php
require_once 'config.php';
require __DIR__.'/src/models/recipe-model.php';

// Fetching all recipes from database - assuming the database is okay
$connection = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
$statement = $connection->query('SELECT id, title FROM recipe');
$recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

// Generate the web page
$recipes = getAllRecipes();

require __DIR__ . '/src/views/index.php';
?>

