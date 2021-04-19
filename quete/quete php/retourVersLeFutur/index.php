<?php

$presentTime = new DateTime("2021-04-19");
$presentTime->setTime(14, 55, 24);
echo $presentTime->format("m-d-Y H:i:s");
echo "</br>";

$destinationTime = new DateTime("1111-11-11");
$destinationTime->setTime(11, 11, 11);
echo $destinationTime->format("m-d-Y H:i:s");
echo "</br>";

$diference = $presentTime->diff($destinationTime);

echo $diference->format("%Y années %m mois %d jours %H heures %i minutes %s secondes"); 
echo "</br>";

if ($diference->format("Y")<50 ){
    echo "Ca marche à l'electricité mais il faut une reaction nucléaire pour génerer les 2,21 gigowatts ";
    echo "</br>";
    echo "QUOI 2,21 GIGOWATTS";
    echo "</br>";
     
}
?>

<img src="https://media.giphy.com/media/ktRHi4nFxNDOw/giphy.gif">