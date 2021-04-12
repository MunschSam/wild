<?php
require '../vendor/autoload.php';
use App\Hello;
use HelloWorld\SayHello;

$hello = new App\Hello();
echo $hello->talk();

echo SayHello::world();