 <!DOCTYPE html>
<html>
<head>
    <title>Exercices PHP – Les structures de contrôle</title>
</head>

<body>
<h1>Exercices PHP – Les structures de contrôle</h1>

<?php
$count = 0;
do {
    $a = rand(0, 9);
    $b = rand(0, 9);
    $c = rand(0, 9);
    $count++;
} while($a%2==1||$b%2==0||$c%2==0);
echo "nombre de tirage: $count <br>";
echo "nombre obtenu: ", $a, $b, $c;
?>

</body>
</html>