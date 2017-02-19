<?php

// API
require 'recuperateur.php';

// Tableaux des infos souhaités
$ligne3 = getMetroSuivant(3, 474, 'A');
$ligne5A = getMetroSuivant(5, 456, 'A');
$ligne5R = getMetroSuivant(5, 456, 'R');
$ligne9A = getMetroSuivant(9, 456, 'A');
$ligne9R = getMetroSuivant(9, 456, 'R');
$ligne96 = getBusSuivant(96, "96_1");

?>
<style type="text/css">
 body {color:white;margin:0;padding:0;width:650px}
 #tables {color:white;text-align:center;display: inline-block;}
 #tables table {display:inline-block;}
 </style>
<script type="text/JavaScript">
    /* Changer cette valeur pour faire des mises à jour plus rapides */
	setTimeout("location.reload(true);", 86400000);
</script>
<div id="tables">
<!-- Affichage fait à la main. -->
<table width="100px"><th>M3 > Pont de Levallois</th><tr><td><?php if(isset($ligne3[0])){echo $ligne3[0];} ?></td></tr><tr><td><?php if(isset($ligne3[1])){echo $ligne3[1];} ?></td></tr><tr><td><?php if(isset($ligne3[2])){echo $ligne3[2];} ?></td></tr><tr><td><?php if(isset($ligne3[3])){echo $ligne3[3];} ?></td></tr></table>
<table width="100px"><th>M5 > Place d'Italie</th><tr><td><?php if(isset($ligne5A[0])){echo $ligne5A[0];} ?></td></tr><tr><td><?php if(isset($ligne5A[1])){echo $ligne5A[1];} ?></td></tr><tr><td><?php if(isset($ligne5A[2])){echo $ligne5A[2];} ?></td></tr><tr><td><?php if(isset($ligne5A[3])){echo $ligne5A[3];} ?></td></tr></table>
<table width="100px"><th>M5 > Bobigny</th><tr><td><?php if(isset($ligne5R[0])){echo $ligne5R[0];} ?></td></tr><tr><td><?php if(isset($ligne5R[1])){echo $ligne5R[1];} ?></td></tr><tr><td><?php if(isset($ligne5R[2])){echo $ligne5R[2];} ?></td></tr><tr><td><?php if(isset($ligne5R[3])){echo $ligne5R[3];} ?></td></tr></table>
<table width="100px"><th>M9 > Mairie de Montreuil</th><tr><td><?php if(isset($ligne9A[0])){echo $ligne9A[0];} ?></td></tr><tr><td><?php if(isset($ligne9A[1])){echo $ligne9A[1];} ?></td></tr><tr><td><?php if(isset($ligne9A[2])){echo $ligne9A[2];} ?></td></tr><tr><td><?php if(isset($ligne9A[3])){echo $ligne9A[3];} ?></td></tr></table>
<table width="100px"><th>M9 > Pont de S&egrave;vres</th><tr><td><?php if(isset($ligne9R[0])){echo $ligne9R[0];} ?></td></tr><tr><td><?php if(isset($ligne9R[1])){echo $ligne9R[1];}  ?></td></tr><tr><td><?php if(isset($ligne9R[2])){echo $ligne9R[2];}  ?></td></tr><tr><td><?php if(isset($ligne9R[3])){echo $ligne9R[3];}  ?></td></tr></table>
<table width="100px"><th>Bus 96 &gt;</th><tr><td><?php if(isset($ligne96[0][0])){echo $ligne96[0][0];} ?></td></tr><tr><td><?php if(isset($ligne96[0][1])){echo $ligne96[0][1];} ?></td></tr><tr><td><?php if(isset($ligne96[0][2])){echo $ligne96[0][2];} ?></td></tr></table>
</div>
