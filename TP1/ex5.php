 <!DOCTYPE html>
<html>
<head>
    <title>Table de multiplication</title>
</head>

<body>
<h1>Table de multiplication</h1>

<table border="1">

<?php $cols = 10; $rows = 10;
for ($r=1; $r<$rows; $r++){
    if ($r==1) $bg="orange";
    elseif ($r%2==0) $bg="white";
    else $bg="silver";
    echo "<tr bgcolor=$bg>";
    echo "<td bgcolor=\"orange\">".$r."</td>";
    for ($c=2; $c<$cols;$c++){
        echo "<td>".$r*$c."</td>";
    }
    echo "</tr>";}
?>
</table>

</body>
</html>