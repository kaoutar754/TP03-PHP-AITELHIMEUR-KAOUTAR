<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Réinitialisation et destruction de la session (Exercice 6.1)
  Date : 25/10/2026
*/
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>