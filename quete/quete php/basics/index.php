<?php     

//affiche le message //
echo "Hello Fellowship";
echo "<hr/>";

//Le nom du porteur de l'anneau//
$ringBearer = "Bilbon";
//Le nom du créateur de l'anneau//
$ringCreator = "Soron";
$ringCreator = strtoupper($ringCreator);

//Le nombre de membres de la compagnie//
$compagnieMembers= 9;
//Si l'anneau est au doigt ou non//
$ringOnFinger=true;

//Le nom du porteur de l'anneau//
$ringBearer="Frodon";

$wizard="Gandalf";

include 'header.php';
echo "<hr/>";
//Ajoute 1 au nombre de membres et affiche le résultat//
echo $compagnieMembers+1; 
echo "<hr/>";
echo $middleEarth="";
echo "<hr/>";
echo "Le porteur est $ringBearer";
echo "<hr/>";
$newVar ="L'anneau est porté par $ringBearer";
echo "$newVar et $ringCreator le recherche";
echo "<hr/>";
include 'footer.php';
echo "<hr/>";
echo require "wizard.php";

echo "<hr/>";

for ($i = 0; $i < 10; $i = $i) {
    echo $i;
    $i++;
}
echo "<hr/>";
for ($i = 0; $i < 11; $i = $i) {
    echo $i;
    $i++;
}
echo "<hr/>";
for ($i = 1; $i < 11; $i = $i) {
    echo $i;
    $i++;
}
echo "<hr/>";

for ($i = 10; $i >-1; $i = $i) {
    echo $i;
    $i--;
}
echo "<hr/>";

for ($b = 25; $b < 51; $b = $b) {
    echo $b;
    $b += 5;
}
echo "<hr/>";

for ($b = 10; $b > -10; $b = $b) {
    echo $b;
    $b -= 3;
}

echo"<hr/>";

$name = "Darth Vader";
if($name==="Darth Vader"){echo "Sith";}
elseif($name==="Darth Sidius"){echo "Sith";}
elseif($name==="Yoda"){echo "Jedi";} 
else{echo "sans doute une personne sans pouvoir";}

$jedis = ['Obi-Wan Kenobi', 'Yoda', 'Luke Skywalker', 'Windu', 'Qui-gon Jinn'];

$jedis[]= 'Rey';
var_dump($jedis);
echo "<hr/>";
echo $jedis[]="Yoda";
echo "<hr/>";
foreach($jedis as $jedi){
    echo $jedi;
};

$tableau=[
"Yoda" =>900,
"Leia" =>19,
"Luke" =>19,
"Vader" =>46,
"Chewbacca" =>200

];

$tableau +=["Han Solo" =>29];
asort($tableau);
echo "<hr/>";

foreach($tableau as $tab =>$lol){
echo ($tab.$lol);
}
echo "<hr/>";

$races=[
   "jedi"=>["Luke","Yoda","Windu"],
   "sith"=>["Vader","Maul","Doku"],
   "gungan"=>["Jar Jar"],
   "human"=>["Han Solo","Leia"]
];

foreach($races as $race =>$info){
   echo "<h2>$race</h2>";
   echo count($info);
   foreach( $info as $perso ){
   echo "<li>$perso</li>";
   
   
   }
}

    
     

?>