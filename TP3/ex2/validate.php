<!DOCTYPE html>
<html>
<head>
	<title>TP3 - Exercice 2</title>
</head>
<body>
<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$date = $_POST["naissance"];
$sex = $_POST["sex"];
$mail = $_POST["mail"];
$sport = $_POST["sport"];
$ecole = $_POST["ecole"];
$loisir = $_POST["loisir"];
$questions = $_POST["questions"];
$allowed = array('pdf', 'doc', 'png');
$fichier = $_FILES['fichier']['name'];
$ext = pathinfo($fichier, PATHINFO_EXTENSION);

// tester les champs obligatoires et leurs types
if (empty($nom)) $nomErr = "Nom est obligatoire!";
elseif (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) $nomErr = "Nom invalide!";
if (empty($prenom)) $prenomErr="Prenom est obligatoire!";
elseif (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) $prenomErr="Prenom invalide!";
if (empty($date)) $dateErr="Date de naissance est obligatoire!";
elseif ($date !== date("Y-m-d", strtotime($date))) $dateErr="Date de naissance invalide!";
if (empty($mail)) $mailErr="Mail est obligatoire!";
elseif (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$mail)) $mailErr="Mail invalide!";
// Ecole ou Loisir
if (!empty($ecole) && !empty($loisir)) $elErr="Une seule case à cocher est possible";
elseif (!empty($ecole)) $el=$ecole;
elseif (!empty($loisir)) $el=$loisir;
// type du fichier
if (!in_array(strtolower($ext), $allowed)) $fichierErr="Le fichier chargé doit avoir une extension PDF, DOC ou PNG";

// Tableau des données
if (empty($nomErr)&&empty($prenomErr)&&empty($dateErr)&&empty($mailErr)&&empty($elErr)&&empty($fichierErr)) {
echo "<h2>Tableau des données</h2>";
echo "<table border=\"1\">";
echo "<tr><td>Nom</td><td>".$nom."</td></tr>";
echo "<tr><td>Prenom</td><td>".$prenom."</td></tr>";
echo "<tr><td>Date de naissance</td><td>".$date."</td></tr>";
echo "<tr><td>Sex</td><td>".$sex."</td></tr>";
echo "<tr><td>Mail</td><td>".$mail."</td></tr>";
echo "<tr><td>Sport</td><td>".$sport."</td></tr>";
echo "<tr><td>Ecole ou Loisir</td><td>".$el."</td></tr>";
echo "<tr><td>Questions</td><td>".$questions."</td></tr>";
echo "<tr><td>Fichier</td><td>".$fichier."</td></tr>";
} else {
echo "<h2>Tableau des erreurs</h2>";
echo "<table border=\"1\">";
echo "<tr><td>Nom</td><td>".$nomErr."</td></tr>";
echo "<tr><td>Prenom</td><td>".$prenomErr."</td></tr>";
echo "<tr><td>Date de naissance</td><td>".$dateErr."</td></tr>";
echo "<tr><td>Mail</td><td>".$mailErr."</td></tr>";
echo "<tr><td>Ecole ou Loisir</td><td>".$elErr."</td></tr>";
echo "<tr><td>Fichier</td><td>".$fichierErr."</td></tr>";
}
echo "</table>";
?>
</body>
</html>