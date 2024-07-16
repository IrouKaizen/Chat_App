<?php
// Chargement du fichier form.php qui contient la définition de la classe Form
require 'form.php';

// Création d'un nouvel objet Form avec un tableau de données préremplies
$form = new Form(array(
    'username' => 'Roger',
    'password' => 'secret',
    'description' => 'Je suis un utilisateur',
    'gender' => 'male',
    'newsletter' => 'yes'
));

// Génération d'un champ de formulaire pour le nom d'utilisateur
echo $form->input('username');

// Génération d'un champ de formulaire pour le mot de passe
echo $form->input('password');

// Génération d'une zone de texte pour la description
echo $form->textarea('description');

// Génération d'une liste déroulante pour le genre
echo $form->select('gender', array(
    'male' => 'Homme',
    'female' => 'Femme',
    'other' => 'Autre'
));

// Génération d'une case à cocher pour l'inscription à la newsletter
echo $form->checkbox('newsletter', 'yes', true);

// Génération d'un bouton de soumission
echo $form->submit();
