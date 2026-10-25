<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Traitement et validation du formulaire POST
  Date : 25/10/2026
*/

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<h2>Résultat de la saisie (POST)</h2>";
// verification avec isset et empty
if (
    isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) &&
    !empty(trim($_POST['nom'])) &&
    $_POST['note_info'] !== '' &&
    $_POST['note_math'] !== ''
) {

    $nom = trim($_POST['nom']);
    $note_info = floatval($_POST['note_info']);
    $note_math = floatval($_POST['note_math']);

    // 2. Vérification si les notes sont comprises entre NOTE_MIN et NOTE_MAX
    if (
        $note_info >= NOTE_MIN && $note_info <= NOTE_MAX &&
        $note_math >= NOTE_MIN && $note_math <= NOTE_MAX
    ) {
        // Calcul de la moyenne
        $moyenne = ($note_info + $note_math) / 2;
        // 1. Écriture dans le fichier CSV
        $fichier = fopen("data/notes.csv", "a");
        if ($fichier) {
            fputcsv($fichier, [$nom, $note_info, $note_math], ";");
            fclose($fichier);
        }
        // 3. Affichage du récapitulatif avec htmlspecialchars)
        echo "<h3>Récapitulatif des notes</h3>";
        echo "<p><strong>Étudiant :</strong> " . htmlspecialchars($nom) . "</p>";
        echo "<p><strong>Note Informatique :</strong> " . $note_info . " / " . NOTE_MAX . "</p>";
        echo "<p><strong>Note Mathématiques :</strong> " . $note_math . " / " . NOTE_MAX . "</p>";
        echo "<p><strong>Moyenne :</strong> " . number_format($moyenne, 2) . " / " . NOTE_MAX . "</p>";
    } else {
        echo "<strong>Erreur :</strong> Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX ;
    }
} else {
    // Erreur : Champs manquants ou vides
    echo "<strong>Erreur :</strong> Veuillez remplir tous les champs du formulaire.";
}

include 'includes/pied_inc.php';

/*Queqtion 3:
  1 Pourquoi préférer POST à GET pour un mot de passe ?
 - Masquage : GET affiche le mot de passe dans l'URL ; POST le masque dans le corps HTTP.
 - Sécurité : GET est enregistré en clair dans l'historique et les logs serveur.
  2 Que contient $_REQUEST ?
 - Contenu : Regroupe $_GET, $_POST et $_COOKIE.
 - Usage : À éviter au profit de $_GET ou $_POST (plus précis et sécurisé).
 */


/*
 * QUESTION EXERCICE 5.1 :
 * Avec le mode "a" (Append) :
 Les nouvelles données sont ajouté à la fin sans suppression des données precedantes
 Le fichier contient bien l'ensemble des 4 apprenants.
 
  Avec le mode "w" (Write) :
 Le fichier est écrase le contenu précedant
 Résultat : Seul le dernier apprenant  resterait conservé dans le fichier
 */
?>