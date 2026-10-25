<?php
/*
 AIT EL HIMEUR KAOUTAR
 Objectif :Maitrise de la structure de controle et les boucles
 Date : 25/10/2026
 */

//inclusion du fichier config
require 'config.php';
echo "<h1>Partie 2 : Structures de contrôle et boucles</h1>";

echo "<h2>EXERCICE 2.1 :if / elseif / else</h2>";
function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL){
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// Test de la fonction 
$notes_test = [18, 15, 13, 10, 7];
foreach ($notes_test as $n) {
    echo "Note : $n/20 => Mention : <strong>" . mention($n) . "</strong><br>";
}

echo "<h2>Exercice 2.2 : Structure switch</h2>";
$num_mois = date("m"); 
switch ($num_mois) {
    case "01": $nom_mois = "Janvier"; break;
    case "02": $nom_mois = "Février"; break;
    case "03": $nom_mois = "Mars"; break;
    case "04": $nom_mois = "Avril"; break;
    case "05": $nom_mois = "Mai"; break;
    case "06": $nom_mois = "Juin"; break;
    case "07": $nom_mois = "Juillet"; break;
    case "08": $nom_mois = "Août"; break;
    case "09": $nom_mois = "Septembre"; break;
    case "10": $nom_mois = "Octobre"; break;
    case "11": $nom_mois = "Novembre"; break;
    case "12": $nom_mois = "Décembre"; break;
    default:   $nom_mois = "Inconnu"; break;
}

echo "Le mois actuel est : <strong>$nom_mois</strong><br>";

/* 
 question3:
 si on oublie le mot-clé 'break', PHP ne s'arrête pas dans le case convenable
 il continue d'exécuter les instructions des 'case' suivants même s'ils ne correspondent pas.
 c'est ce qu'on appelle le phénomène de "fall-through".
 */

// EXERCICE 2.3 
echo "<h2>Exercice 2.3:les boucles</h2>";
echo "<h3>1 affichage du triangle:</h3>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

echo "<h3>2 nombres de 0 à 20 par pas de 2:</h3>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>10</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}
echo "<br>";
echo "<h3>3  Nombres pairs:</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 !== 0) { 
        continue;       
    }
    echo "$i ";
}
echo "<br>";
echo "<h3>4 utilisation du break 2:</h3>";
$i = 1;
while (true) { // Boucle infinie
    switch ($i) {
        case 5:
            echo "Valeur atteinte : 5<br>";
            break; // Sort uniquement du switch
        case 10:
            echo "Valeur atteinte : 10  Arret du programme <br>";
            break 2; // Sort du switch ET de la boucle while en même temps
    }
    $i++;
}

// 5. Réécriture de la question 2 avec do-while
echo "<h3>5 réécriture de la question 2 avec do-while:</h3>";
$i = 0;
do {
    if ($i == 10) {
        echo "<strong>10</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
} while ($i <= 20);

/* 
 question 5 :
 La différence principale entre 'while' et 'do-while' 
- 'while' teste la condition au debut sii la condition est fausse au départ le code ne s'exécute jamais alors le code peut s'éxecuter 0 fois.
- 'do-while' teste la condition à la fin  Le code est donc exécuté au moins une fois même si la condition est fausse dès le début.
 */

?>