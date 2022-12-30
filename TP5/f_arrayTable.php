<?php
function arrayTable($array, $kindex=false) {
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
?>
