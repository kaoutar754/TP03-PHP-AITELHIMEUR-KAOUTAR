<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Traitement du formulaire GET 
  Date : 25/10/2026
*/

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
$nom = isset($_GET['nom']) ? $_GET['nom'] : '';
$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : '';
$sexe = isset($_GET['sexe']) ? $_GET['sexe'] : '';

if ($sexe === 'M') {
    $titre = "Bonjour Monsieur";
} else {
    $titre = "Bonjour Madame";
}

// Affichage du message personnalisé
echo "<p>" . $titre . " " . $prenom. " " . $nom. "</p>";

include 'includes/pied_inc.php';

/*Observation sur l'url:toutes les données saisies apparaissent
dans l'URL sous forme de paramètres (paires clé=valeur séparées par des '&')*/

?>