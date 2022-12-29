<!DOCTYPE html>
<html>
<head>
	<title>TP2 - Exercice 5</title>
</head>
<body>
<?php

$tab1 = array(5, 3, 367, -2, 45, 9);
$tab2 = array('Omar' => 12, 'Ilyass' => 9, 'Imane' => 15, 'Salma' => 10, 'Mohamed' => 16, 'Nouhaila' => 11);

function html_table($array, $kindex=false) {
	echo "<table border=\"1\"><thead>";
	if ( $kindex or !array_is_list($array)) {
		echo "<tr>";
		foreach ($array as $key => $value) {
			echo "<th>".$key."</th>"; }
		echo "</tr></thead><tbody>";
	}
	echo "<tr>";
	foreach ($array as $value) {
	echo "<td> ".$value."</td>"; }
	echo "</tr></tbody></table>";
}

html_table($tab1, kindex: true);
echo "<br>";
html_table($tab2);

?>
</body>
</html>
