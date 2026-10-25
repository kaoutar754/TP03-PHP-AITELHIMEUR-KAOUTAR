<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Sérialisation et export JSON (Exercice 5.4)
  Date : 25/10/2026
*/

include 'includes/entete_inc.php';

echo "<h2>Exercice 5.4 : Sérialisation et Export JSON</h2>";

$fichier= "data/notes.csv";
$donnees = [];

// tableau associatif des résultats
if (file_exists($fichier)) {
    $f = fopen($fichier, "r");
    while (($ligne = fgetcsv($f, 1000, ";")) !== false) {
        if (count($ligne) >= 3) {
            $info = floatval($ligne[1]);
            $math = floatval($ligne[2]);
            $donnees[] = [
                'nom' => $ligne[0],
                'note_info' => $info,
                'note_math' => $math,
                'moyenne' => ($info + $math) / 2
            ];
        }
    }
    fclose($f);
}

// 2. Écriture dans data/notes.json avec json_encode() et file_put_contents()
$json_data = json_encode($donnees, JSON_PRETTY_PRINT);
file_put_contents("data/notes.json", $json_data);

// 3. Relecture du fichier JSON et affichage avec print_r()
$json_lu = file_get_contents("data/notes.json");
$donnees_decodees = json_decode($json_lu, true);

echo "<h3>3. Contenu relu depuis notes.json :</h3>";
echo "<pre>";
print_r($donnees_decodees);
echo "</pre>";

// 4. Comparaison entre serialize() et json_encode()
$chaine_serialize = serialize($donnees);

echo "<h3>4. Comparaison des formats :</h3>";
echo "<p><strong>json_encode() :</strong><br><code>" . htmlspecialchars($json_data) . "</code></p>";
echo "<p><strong>serialize() :</strong><br><code>" . htmlspecialchars($chaine_serialize) . "</code></p>";

include 'includes/pied_inc.php';
/*Question : lequel de ces formats est directement exploitable par une application JavaScript ?
Le format directement exploitable par une application JavaScript est le JSON (JavaScript Object Notation), 
car sa structure est nativement prise en charge par JavaScript et peut être directement convertie en objet 
manipulable via la fonction JSON.parse(). À l'inverse, le format de sérialisation native de PHP (serialize()) 
est un format propriétaire propre à PHP, nécessitant un traitement ou des bibliothèques externes pour être interprété 
par d'autres langages.*/ 
?>