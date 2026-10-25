<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Lecture du fichier CSV et affichage du tableau récapitulatif (Exercice 5.2)
  Date : 25/10/2026
*/

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Exercice 5.2 : Liste des étudiants </h2>";

$fichier= "data/notes.csv";
// 1. Test de l'existence du fichier avec file_exists()
if (!file_exists($fichier)) {
    echo "<p>Le fichier des données n'existe pas encore</p>";
    exit();
}

// 2. Ouverture en lecture et gestion de l'échec
$fichier = fopen($fichier, "r");
if (!$fichier) {
    echo "<p><strong>Erreur :</strong> Impossible d'ouvrir le fichier data/notes.csv.</p>";
    exit();
}

// Initialisation des variables pour le calcul de la moyenne générale
$somme_moyennes = 0;
$nbr_etud= 0;

// 4. Début du tableau HTML
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nom</th>
        <th>Informatique</th>
        <th>Mathématiques</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

// 3 Lecture ligne par ligne avec fgetcsv() dans une boucle while
while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {
    if (count($ligne) >= 3) {
        $nom = htmlspecialchars($ligne[0]);
        $note_info = floatval($ligne[1]);
        $note_math = floatval($ligne[2]);

        // Calcul de la moyenne de l'étudiant
        $moyenne = ($note_info + $note_math) / 2;

        // Détermination de la mention
        if ($moyenne >= 16) {
            $mention = "Très Bien";
        } elseif ($moyenne >= 14) {
            $mention = "Bien";
        } elseif ($moyenne >= 12) {
            $mention = "Assez Bien";
        } elseif ($moyenne >= 10) {
            $mention = "Passable";
        } else {
            $mention = "Ajourné";
        }

        // Affichage de la ligne du tableau
        echo "<tr>";
        echo "<td>{$nom}</td>";
        echo "<td>{$note_info}</td>";
        echo "<td>{$note_math}</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>{$mention}</td>";
        echo "</tr>";
        $somme_moyennes += $moyenne;
        $nbr_etud++;
    }
}
fclose($fichier);

echo "</table>";

// 5 Affichage de la moyenne générale de la classe sous le tableau
if ($nbr_etud > 0) {
    $moyenne_generale = $somme_moyennes / $nbr_etud;
    echo "<p><strong>Moyenne générale est:</strong> " . number_format($moyenne_generale, 2) ."</p>";
} else {
    echo "<p>Aucune donnée  trouvée dans le fichier.</p>";
}

echo "<hr>";
//Exercice 5.3 : Lecture bas niveau
$f= "data/notes.csv";
$fichier1= fopen($f, "r");

if ($fichier1) {
    // Lecture ligne par ligne jusqu'à la fin du fichier (feof)
    while (!feof($fichier1)) {
        $ligne = fgets($fichier1);
        if ($ligne !== false && trim($ligne) !== '') {
            $champs = explode(';', trim($ligne));
            if (count($champs) >= 3) {
                $nom = htmlspecialchars($champs[0]);
                $note_info = $champs[1];
                $note_math = $champs[2];

                echo "<strong>Étudiant :</strong> {$nom} | <strong>Info :</strong> {$note_info} | <strong>Math :</strong> {$note_math}<br>";
            }
        }
    }
    fclose($fichier1);
}
/*La méthode fgetcsv() est la plus adaptée aux fichiers CSV car elle découpe automatiquement les champs et nettoie les guillemets autour des textes, 
tandis que l'approche fgets() + explode() est plus rapide pour lire du texte brut mais reste basique et fragile, car elle conserve les guillemets 
(comme autour des noms) et nécessite un nettoyage manuel des sauts de ligne avec trim(). */
include 'includes/pied_inc.php';
?>