<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fetch Data</title>
</head>
<body>
<?php
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "VideoLibrary";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  echo "<h3>Question 1</h3>";
  $pdo1 = $conn->prepare("SELECT * FROM Film where inProjection = true");
  $pdo1->execute();
  $pdo1_data = $pdo1->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
  print_r($pdo1_data);
  echo "</pre>";

  echo "<h3>Question 2</h3>";
  $pdo2 = $conn->prepare("SELECT f.* FROM Film f, Genre g where g.idGenre = f.idGenre and g.libelle = 'Science-fiction'");
  $pdo2->execute();
  $pdo2_data = $pdo2->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
  print_r($pdo2_data);
  echo "</pre>";

  echo "<h3>Question 3</h3>";
  $pdo3 = $conn->prepare("SELECT f.titre FROM Film f, Programme p where p.num_salle = 5 and f.inProjection = true");
  $pdo3->execute();
  $pdo3_data = $pdo3->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
  print_r($pdo3_data);
  echo "</pre>";
} catch(PDOException $err) {
  echo "Connection failed: " . $err->getMessage();
}
$conn = null;
?>
</body>
</html>
