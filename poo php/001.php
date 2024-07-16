<?php
//La pratique veut qu'on crée un fichier par classe

require 'Personnage.php';
$merlin = new Personnage();
$merlin->nom = "Merlin";
//$merlin->regenerer(5);

$harry = new Personnage("harry");

$merlin->attaque($harry);
//$harry->vie <= 0; true
//var_dump() est une fonction de PHP qui permet d'afficher des informations détaillées sur une variable, y compris son type et sa valeur. Cette fonction peut être utilisée pour déboguer du code, pour comprendre comment une variable est utilisée ou pour en savoir plus sur une variable donnée.
//var_dump($harry->mort()); //false
//$harry->regenerer();


//on veut savoir si harry est vivant ou pas
if($harry->mort()){
    echo 'harry est mort';
}
else{
    echo 'harry a survécu ' . $harry->vie;
    //nous montre l'âge à laquelle harry est mort
}
?>