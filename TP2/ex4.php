<!DOCTYPE html>
<html>
<head>
	<title>TP2 - Exercice 4</title>
</head>
<body>
<?php

$tab = array(5, 1, 6, 2);
echo "Unsorted array: ";
for ($i=0; $i < count($tab); $i++)
	echo $tab[$i]." , ";
echo "<br>";

function SortArray(&$tab) {
for ($i=0; $i < count($tab); $i++) { 
	for ($j=0; $j < count($tab)-1; $j++) {
		if ($tab[$j] > $tab[$j+1]) {
			$temp = $tab[$j];
			$tab[$j] = $tab[$j+1];
			$tab[$j+1] = $temp;
		}
	}
}
}

SortArray($tab);
echo "Sorted array: ";
for ($i=0; $i < count($tab); $i++)
	echo $tab[$i]." , ";

?>
</body>
</html>