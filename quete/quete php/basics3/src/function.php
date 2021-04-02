<?php


function sayHello(string $name="Hello Dr. Manhattan"):string
{

    return 'hello'.$name;
}
$name="";
echo sayHello($name);


$watchmen=['Dr. Manhattan', 'Ozymandias', 'Silk Spectre', 'Rorschach', 'The comedian', 'Nite Owl'];
function whoAmI(string $names, array $watchmen ):string
{
foreach($watchmen as $name2){
    if($names===$name2){
     $phrase=($names."est un watchmen");
     return $phrase;
}}


    foreach($watchmen as $name2){
    if($names != $name2){
        $phrase=($names."n'est pas un watchmen");
        return $phrase;}}
    
    
echo whoAmI("Ozymandias",$watchmen);
?>