<!DOCTYPE html>
<html>
<head>
	<title>TP2 - Exercice 5</title>
</head>
<body>
<?php

$tab1 = array(5, 3, 367, -2, 45, 9);
$tab2 = array('Omar' => 12, 'Ilyass' => 9, 'Imane' => 15, 'Salma' => 10, 'Mohamed' => 16, 'Nouhaila' => 11);

function echoArray($array) {
	for ($i=0; $i < count($array); $i++) {
		$ind[$i] = $i;
	}
	echo "<table border=\"1\" width=\"25%\"><tbody>";
	if (array_keys($array) != array_keys($ind)) {
		foreach ($array as $key => $value) {
			echo "<tr><th>".$key."</th> ";
			echo "<td> ".$value."</td>";
			echo "</tr>";
		}
	}
	else {
		foreach ($array as $key => $value) {
			echo "<td> ".$value."</td>";
			echo "</tr>";
		}
	}
	echo "</tbody> </table>";
}

echoArray($tab1);
echo "<br>";
echoArray($tab2);

?>
</body>
</html>