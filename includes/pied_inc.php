<!--
  Nom : AIT EL HIMEUR KAOUTAR
  Objectif :pied de la page
  Date : 25/10/2026
-->
<hr>
<footer>
    <?php
    $date_aujourdhui = date('d/m/Y');
    $aujourdhui = new DateTime();
    $fin_semestre = new DateTime('2027-01-30'); 
    $intervalle = $aujourdhui->diff($fin_semestre);
    $jours_restants = $intervalle->days;
    ?>
<p>&copy; <?php echo date('Y'); ?> - <?php echo ETABLISSEMENT; ?></p>
<p>Nous sommes le :<?php echo $date_aujourdhui; ?></p>
<p>Il reste <?php echo $jours_restants; ?> jours avant la fin du semestre.</p>
</body>
</html>