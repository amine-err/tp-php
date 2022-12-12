<!DOCTYPE html>
<html>
<head>
	<title>TP2 - Exercice 3</title>
</head>
<body>
<?php

$tab = array('L’économiste' => 'google.com', 'L’opinion' => 'google.com', 'Aujourd’hui le Maroc' => 'google.com');
echo "<ul>";
	foreach ($tab as $key => $value) {
	echo "<li><a href='".$value."'>".$key."</li>"; }
echo "</ul>";

?>
</body>
</html>