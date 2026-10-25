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
echo "le prix TTC du produit est de $prix_ttc £ <br>";

//exercice  1.4 types et conversions
echo "<h2> exercice 1.4:types et conversions</h2>";
$test=42;
$test=(string)$test;
var_dump($test);
echo"<br><br>";
echo "<h3>2.transtypage vers bool:</h3>";
#transtypage vers bool
/*prédaction:
(bool) 0 :false 
(bool) 0.0:false 
(bool) "0" :false 
(bool) ""  :false chaîne vide
(bool) "abc":true chaîne non vide
(bool) [] false tableau vide
(bool) null :false */

//verification avec var_dump()
echo "0 : "; var_dump((bool) 0); echo "<br>";
echo "0.0 : "; var_dump((bool) 0.0);echo "<br>";
echo '"0" : '; var_dump((bool) "0");echo "<br>";
echo '"" : '; var_dump((bool) "") ;echo "<br>";
echo '"abc" : '; var_dump((bool) "abc") ;echo "<br>";
echo '[] : '; var_dump((bool) []) ;echo "<br>";
echo 'null : '; var_dump((bool) null);echo "<br>";

echo"<br><br>";
echo "<h3>question3:</h3>";
//predaction pour la question 3
// (int) 3.9     => 3    (On enlève la virgule, sans arrondir)
// (int) "12abc" => 12   (On garde juste les premiers chiffres)
// (float) "1.5e3"=> 1500 (Calcule 1.5 x 1000)
// (int) true    => 1    (Le vrai 'true' devient le chiffre 1)

#vérification avec var_dump()
echo '(int) 3.9 : '; var_dump((int) 3.9);echo "<br>";
echo '(int) "12abc" : '; var_dump((int) "12abc");echo "<br>";
echo '(float) "1.5e3" : '; var_dump((float) "1.5e3");echo "<br>";
echo '(int) true : '; var_dump((int) true);
echo"<br><br>";

//ecriture du nombre 255 sous 4 bases numériques
/* 
-1 decimal(base 10)
255 = (2 * 10^2) + (5 * 10^1) + (5 * 10^0) = 200 + 50 + 5 = 255
-2 binaire:
255 / 2 = 127  reste  1  
127 / 2 =  63  reste  1  
63 / 2 =  31  reste  1  
31 / 2 =  15  reste  1 
15 / 2 =   7  reste  1  
 7 / 2 =   3  reste  1  
3 / 2 =   1  reste  1  
1 / 2 =   0  reste  1
lecture de bas en haut
resultat est:11111111
-hexadecimal: 
on regroupe 4bit
1111 = 8 + 4 + 2 + 1 = 15  F
 1111 = 8 + 4 + 2 + 1 = 15  F
 resultat:0xFF
-octal:
on regroupe 3 bits
011 = 0 + 2 + 1 = 3
111 = 4 + 2 + 1 = 7
111 = 4 + 2 + 1 = 7
resultat:377 */
#affichage
$bin = 0b11111111; 
$hex = 0xFF;       
$oct = 0o377;      
$dec = 255;        
echo "<h3>4. Affichage des 4 bases :</h3>";
echo "Binaire (0b11111111) : " . $bin . "<br>";
echo "Hexadécimale (0xFF) : " . $hex . "<br>";
echo "Octale (0o377) : " . $oct . "<br>";
echo "Décimale (255) : " . $dec . "<br>";
echo"<br>";
// EXERCICE 1.5 
echo "<h2> exercice 1.5:chaine de caractere</h2>";
$traitees = "égales à";
$ici = 2;

echo '1. Ahmed a dit : "J\'ai réussi"<br>';

// 2
// On échappe l'antislash avec \\ pour qu'il s'affiche correctement
echo '2. Voulez-vous supprimer C:\\*.*?<br>';

// 3. Ceci n'affichera pas \n de nouvelle ligne
// Les guillemets simples empêchent l'interprétation du \n
echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';

// 4. Les variables ne seront pas $traitees $ici
// Les guillemets simples empêchent l'évaluation des variables $traitees et $ici
echo '4. Les variables ne seront pas $traitees $ici<br>';

// 5.Les variables seront égales à 2
// Les guillemets doubles permettent d'interpréter $traitees et $ici
echo "5. Les variables seront $traitees $ici<br><br>";

// TRAITEMENT AVEC TRIM()
$texte= "*Bonjour les développeurs*";
$texte_nv = trim($texte, "*");
echo "Texte trim() : " . $texte_nettoye . "<br><br>";
echo "Affichage lettre par lettre :<br>";

for ($i = 0; $i < strlen($texte_nv); $i++) {
    echo $texte_nv[$i] . "<br>";
}
?>
