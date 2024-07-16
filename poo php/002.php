<?php

// Chargement du fichier form.php et test.php
require 'form.php';
require 'test.php';

// Création d'un nouvel objet Form avec un tableau de données préremplies
$form = new Form($_POST);
var_dump(Text::withZero(4));
?>
<form action="#" method="post">
    <?php
    // Génération de champs de formulaire avec l'objet $form
echo $form->input('username');
echo $form->input('password');

// Génération d'un bouton de soumission
echo $form->submit();
?>
</form>
