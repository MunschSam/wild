<?php

$email = $_POST['user_email'];

if(filter_var ($email,FILTER_VALIDATE_EMAIL)=== FALSE){
    print "Bad Email";
}

echo "Merci" ."<br/>". $_POST['user_name'] . "<br/>" .$_POST['user_surname'] ."<br/>". "de nous avoir contacté à propos de " ."<br/>". $_POST['sujet'] .

"<br/>".".Un de nos conseiller vous contactera soit à l’adresse" ."<br/>".$email ."<br/>"."ou par téléphone au " ."<br/>". $_POST['telephone'] ."<br/>". "dans les plus brefs délais pour traiter votre demande :"."<br/>". $_POST['user_message']


;
?>