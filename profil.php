<?php
session_start();
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Page de profil sécurisée
  Date : 25/10/2026
*/
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
?>
<h2>Profil Utilisateur</h2>
<p>Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['login']); ?></strong> ! Vous êtes bien connecté.</p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

<?php include 'includes/pied_inc.php'; ?>