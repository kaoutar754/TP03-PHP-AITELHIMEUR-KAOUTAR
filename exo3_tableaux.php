<?php
/*
 AIT EL HIMEUR KAOUTAR
 objectif:  Manipulations des tableaux 
 Date: 25/10/2026
 */
/*Expérience 1 : Test include/require 
include 'fichier_test.php'; 
 Affiche un Warning mais continue l'exécution de la page.
require 'fichier_test.php'; 
 Affiche une Fatal Error etarrete l'exécution du script.

Expérience 2 : Test include/include_once
inclusion deux fois:'includes/menu_inc.php'; 
  Le menu s'affiche 2 fois sur la page.
inclusion deux fois:include_once 'includes/menu_inc.php'; 
  Le menu ne s'affiche qu'une seule fois car PHP évite la répétition.
*/
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
echo "<h1>Partie 3 : Tableaux </h1>";

echo "<h2>Exercice 3.1 : Création</h2>";
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["Prog web Php ", "Python", "Analyse"];

function mention(float $note): string {
    if ($note >= 16) return "Très bien";
    if ($note >= 14) return "Bien";
    if ($note >= 12) return "Assez bien";
    if ($note >= SEUIL) return "Passable"; // SEUIL = 10 
    return "Ajourné";
}

// Affichage avec foreach
echo "<h3>Affichage du tableau modules avec foreach :</h3>";
foreach ($modules as $mod) {
    echo $mod ."<br>";
}

// Affichage en accédant aux éléments par leur indice
echo "<h3>Affichage du tableau modules par leur indice :</h3>";
for ($i = 0; $i < count($modules); $i++) {
    echo "module $i : " . $modules[$i] . "<br>";
}

echo "<h2>Exercice 3.2 : Affichage HTML</h2>";
echo "
<style>
    table { border-collapse: collapse; width: 60%; margin-bottom: 20px; }
    th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
    th { background-color: #f0f0f0; }
    .rouge { color: red; font-weight: bold; }
</style>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Note</th>
            <th>Mention</th>
        </tr>
    </thead>
    <tbody>";
    foreach ($notes as $nom => $note) {
    $classe_rouge = ($note < SEUIL) ? 'class="rouge"' : '';
    echo "<tr $classe_rouge>";
    echo "<td>$nom</td>";
    echo "<td>$note/20</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}
echo"
    </tbody>
</table>";

echo "<h2>Exercice 3.3 : Statistiques</h2>";

//1 Calculs avec une boucle (sans utiliser array_sum())
$somme= 0;
$nb= 0;
$max=0;
$min= 0;

foreach ($notes as $nom => $note) {
    $somme+= $note;
    $nb++;
    if ($max === 0 || $note > $max) {
        $max= $note;
    }
    if ($min=== 0|| $note < $min) {
        $min = $note;
    }
}
$moyenne = $somme/ $nb;

echo "<h3>1. Calculs avec boucle :</h3>";
echo "Somme : $somme<br>";
echo "Moyenne : " . number_format($moyenne, 2) . "/20<br>";
echo "Meilleure note : $max/20<br>";
echo "La note la plus faible : $min/20<br>";

//2: Vérification avec array_sum, count, max et min
$somme_php = array_sum($notes);
$moyenne_php = $somme_php / count($notes);
$max_php = max($notes);
$min_php = min($notes);

echo "<h3>2. Vérificationde résultat:</h3>";
echo "array_sum() : $somme_php <br>";
echo "count() : " . count($notes) . "<br>";
echo "Moyenne calculée : " . number_format($moyenne_php, 2) . "/20<br>";
echo "max() : $max_php<br>";
echo" min() : $min_php<br>";

//3: Tableau associatif $effectifs
$effectifs = [
    "Très bien"  => 0,
    "Bien"       => 0,
    "Assez bien" => 0,
    "Passable"   => 0,
    "Ajourné"    => 0
];

foreach ($notes as $note) {
    $m = mention($note);
    $effectifs[$m]++;
}

echo "<h3>3. Répartition des effectifs par mention :</h3><ul>";
foreach ($effectifs as $m => $nombre) {
    echo "$m : $nombre apprenant(s)<br>";
}

echo "<h2>Exercice 3.4 : Tri</h2>";

function afficher(array $tab): void {
    foreach ($tab as $cle => $valeur) {
        echo "<strong>$cle</strong> : $valeur<br>";
    }
}

// 1. Tri par noms croissants (ksort)
echo "<h3>1. Tableau trié par noms croissants :</h3>";
$t1 = $notes;
ksort($t1);
afficher($t1);

// 2. Tri par notes décroissantes (arsort)
echo "<h3>2. Tableau trié par notes décroissantes  :</h3>";
$t2 = $notes;
arsort($t2);
afficher($t2);

// 3. Tri par noms décroissants (krsort)
echo "<h3>3. Tableau trié par noms décroissants :</h3>";
$t3 = $notes;
krsort($t3);
afficher($t3);

// 4. Tri par notes croissantes (asort)
echo "<h3>4. Tableau trié par notes croissantes:</h3>";
$t4 = $notes;
asort($t4);
afficher($t4);

/*
 la question  3.4 :
 Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?
 On utilise sort() pour trier le tableau par ordre alphabétique croissant,
 ou rsort() pour un tri décroissant. Ces fonctions réindexent automatiquement 
 les clés numériques (0, 1, 2...).
 */


echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h3>Résultats des tests :</h3>";

// 1. $a + $b
echo "<strong>\$a + \$b :</strong> ";
var_dump($a + $b);
echo "<br>";

// 2. $a == $b
echo "<strong>\$a == \$b :</strong> ";
var_dump($a == $b);
echo "<br>";

// 3. $a === $b
echo "<strong>\$a === \$b :</strong> ";
var_dump($a === $b);
echo "<br>";

/*
Explication des différences :
-$a + $b (Union) : L'opérateur + garde toutes les clés du premier tableau ($a). 
Comme les clés "x" et "y" existent déjà dans $a, PHP n'ajoute rien depuis $b. 
Le résultat est donc exact à $a : ["x" => 1, "y" => 2].

-$a == $b (Égalité) : Retourne TRUE (bool(true)) parce que les deux tableaux 
contiennent les mêmes paires clé/valeur, sans tenir compte de leur ordre.

-$a === $b (Identité) : Retourne FALSE (bool(false)) parce que l'opérateur === 
vérifie la clé, la valeur, le type ET l'ordre des éléments. Dans $a, "x" vient avant "y", 
alors que dans $b, "y" vient avant "x"
 */
include 'includes/pied_inc.php';
?>
