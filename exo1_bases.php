<?php echo"hello php ";
echo "<br>";
//Ait El Himeur Kaoutar
#Date:17/10/2026
/*manipulation des 
variable
php*/
//comparaison entre a et A
$a="bonjour";
$A="hello";
echo "a= $a <br>";
echo "A= $A <br>";

//variable valide
$x=1;
$_x=2;
$Prix_HT=23;
$état="bonne";
/*varibales invalid
$2x=3; commence par chiffre
$x-y=4;le tiret interdit
$prix ht=23;contient espace */

#affichage des constantes
require "config.php";
echo"Etablissement:".ETABLISSEMENT."<br>";
echo "Note min:".NOTE_MIN."<br>";
echo "Seuil:".SEUIL."<br>";
echo "Note max:".NOTE_MAX."<br>";

#utilisation de define()
if (defined("SEUIL")){
    echo "la constante seuil est défine <br>";
}
if (!defined ("INCONNUE")){
    echo "la constante inconnue n'est pas défine .<br><br>";
}
/*
1-l'affichage dune constante non definie provoque une erreor
2-différence entre cont vs define():
    "cont"est evalué à la compilation(ne peut pas étre placé dans une boucle)
     "defne()"est evalué à l'éxécution (peut étre utilisé dynamiqument dans une condition ou fonction)
*/

//exercice 1.3 calcul
$prix_ht=60;
$tva=20;
$prix_ttc=$prix_ht *(1+$tva/100);
echo "le prix TTC du produit est de $prix_ttc £ <br>"

//exercice .4 types et conversions
$test=42;
$test=(string)$test;
var_dump($test);



?>
