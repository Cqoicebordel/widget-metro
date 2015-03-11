<?php

// API
require 'recuperateur.php';

// Tableaux des infos souhaités
$ligne3 = getMetroSuivant(3, 474, 'A');
$ligne5A = getMetroSuivant(5, 456, 'A');
$ligne5R = getMetroSuivant(5, 456, 'R');
$ligne9A = getMetroSuivant(9, 456, 'A');
$ligne9R = getMetroSuivant(9, 456, 'R');

?>
<style type="text/css">
 body {color:white;margin:0;padding:0;width:520px}
 #tables {color:white;text-align:center;display: inline-block;}
 #tables table {display:inline-block;}
 </style>
<script type="text/JavaScript">
    /* Changer cette valeur pour faire des mises à jour plus rapides */
	setTimeout("location.reload(true);", 86400000);
</script>
<div id="tables">
<!-- Affichage fait à la main. -->
<table width="100px"><th>M3 > Pont de Levallois</th><tr><td><?php echo $ligne3[0] ?></td></tr><tr><td><?php echo $ligne3[1] ?></td></tr><tr><td><?php echo $ligne3[2] ?></td></tr><tr><td><?php echo $ligne3[3] ?></td></tr></table>
<table width="100px"><th>M5 > Place d'Italie</th><tr><td><?php echo $ligne5A[0] ?></td></tr><tr><td><?php echo $ligne5A[1] ?></td></tr><tr><td><?php echo $ligne5A[2] ?></td></tr><tr><td><?php echo $ligne5A[3] ?></td></tr></table>
<table width="100px"><th>M5 > Bobigny</th><tr><td><?php echo $ligne5R[0] ?></td></tr><tr><td><?php echo $ligne5R[1] ?></td></tr><tr><td><?php echo $ligne5R[2] ?></td></tr><tr><td><?php echo $ligne5R[3] ?></td></tr></table>
<table width="100px"><th>M9 > Mairie de Montreuil</th><tr><td><?php echo $ligne9A[0] ?></td></tr><tr><td><?php echo $ligne9A[1] ?></td></tr><tr><td><?php echo $ligne9A[2] ?></td></tr><tr><td><?php echo $ligne9A[3] ?></td></tr></table>
<table width="100px"><th>M9 > Pont de S&egrave;vres</th><tr><td><?php echo $ligne9R[0] ?></td></tr><tr><td><?php echo $ligne9R[1] ?></td></tr><tr><td><?php echo $ligne9R[2] ?></td></tr><tr><td><?php echo $ligne9R[3] ?></td></tr></table>
</div>