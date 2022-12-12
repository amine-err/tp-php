<!DOCTYPE html>
<html>
<head>
	<title>TP2 - Exercice 2</title>
</head>
<body>
<?php

$tab = array('Omar' => 12, 'Ilyass' => 9, 'Imane' => 15, 'Salma' => 10, 'Mohamed' => 16, 'Nouhaila' => 11);

// sans utiliser des fontions
// $moy=0; $c=0;
// foreach ($tab as $value) {
// 	$moy += $value;
// 	if ($c == 0) $max = $min = $value;
// 	if ($max <= $value)	$max = $value;
// 	if ($min >= $value)	$min = $value;
// 	$c++;
// }
// $moy = $moy/$c;

// avec des fonctions
$max=max($tab);
$min=min($tab);
$moy=array_sum($tab)/count($tab);

echo "Note max: ".$max."<br>";
echo "Note min: ".$min."<br>";
echo "Moyenne des notes: ".$moy."<br>";
echo "Ayant une note sup à moyenne: ";
foreach ($tab as $key => $value) {
	if ($value >= $moy)	echo $key.", ";
}

?>
</body>
</html>