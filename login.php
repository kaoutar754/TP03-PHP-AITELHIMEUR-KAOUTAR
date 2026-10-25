<?php
/*
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif : Formulaire de connexion et enregistrement de la session (Exercice 6.1)
  Date : 25/10/2026
*/
session_start();

// 1. إعادة التوجيه إذا كان متصلاً بالفعل
if (isset($_SESSION['login'])) {
    header("Location: profil.php");
    exit();
}

$erreurmsg = "";
$login_par_defaut = "";
$derniere_date = "";

// 2. قراءة الـ Cookie (JSON) لإعادة ملء البيانات إذا كان موجوداً
if (isset($_COOKIE['infos_utilisateur'])) {
    $infos = json_decode($_COOKIE['infos_utilisateur'], true);
    $login_par_defaut = $infos['login'] ?? '';
    $derniere_date    = $infos['date'] ?? '';
}

// 3. معالجة النموذج عند الضغط على Se connecter
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['login'] ?? '');
    
    if (!empty($user)) {
        $_SESSION['login'] = $user;
        
        // إنشاء الـ JSON وتخزينه في الـ Cookie فقط عند نجاح الدخول
        $donnees_cookie = [
            'login' => $user,
            'date'  => date('Y-m-d H:i:s')
        ];
        setcookie("infos_utilisateur", json_encode($donnees_cookie), time() + 86400, "/");
        
        header("Location: profil.php");
        exit(); 
    } else {
        $erreurmsg = "Veuillez saisir un nom d'utilisateur";
    }
}

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';
?>
<h2>Connexion</h2>

<?php if (!empty($erreurmsg)) {
       echo $erreurmsg; 
}
?>


<form action="login.php" method="POST">
    <label for="login">Identifiant:</label>
    <input type="text" id="login" name="login">
    <button type="submit">Se connecter</button>
</form>
<?php if (!empty($derniere_date)): ?>
    <p>Dernière connexion enregistrée le : <?php echo htmlspecialchars($derniere_date); ?></p>
<?php endif; ?>
<?php include 'includes/pied_inc.php'; 
/*
  Réponses aux questions Exercice 6.2 :
  1 Emplacement de stockage :
     - La Session est stockée côté serveur fichiers temporaires.
     - Le Cookie est stocké côté client (dans le navigateur web).

  2  Obligation d'appel avant tout affichage 
     - setcookie() et header() modifient les en-têtes HTTP.
     - Les en-têtes HTTP doivent impérativement être envoyés au
       navigateur AVANT le moindre affichage (HTML, texte, espace)
*/?>
