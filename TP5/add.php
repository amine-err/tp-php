<?php
session_start();
require_once "functions.php";
if (isset($_SESSION['profile']) and $_SESSION['profile']['type']=='admin') {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
      $stmt = PDOconn()->prepare("INSERT INTO Film (idGenre, titre, annee, duree, resume, inProjection) VALUES (:idGenre, :titre, :annee, :duree, :resume, :inProjection)");
      $stmt->execute([ ':idGenre' => $_POST["idGenre"],':titre' => $_POST["titre"], ':annee' => $_POST["annee"], ':duree' => $_POST["duree"], ':resume' => $_POST["resume"], ':inProjection' => $_POST["inProjection"] ]);
      echo "Film inserted to DataBase<br>";
      unset($conn);
    } catch(PDOException $err) {
      echo "Connection failed: ".$err->getMessage()."<br>";
      die();
    }
  }
} else {
  echo "You can't access this page!<br>";
  echo "<a href='login.php'><button>return</button></a>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add movie</title>
</head>
<body>
<?php
try {
  $stmt = PDOconn()->prepare("SELECT * FROM Genre");
  $stmt->execute();
  $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $form = "
  <form id='frm' action='add.php' method='post'><fieldset>
    <label for='idGenre'>Genre </label><br>
    <select name='idGenre' id='idGenre'>";
  foreach ($stmt_data as $value) {
    $form .= "<option value='$value[idGenre]'>$value[libelle]</option>"; }
  $form .= "
    </select><br>
    <label for='titre'>Titre</label><br>
    <input type='text' id='titre' name='titre' required><br>
    <label for='annee'>Année</label><br>
    <input type='number' id='annee' name='annee' required><br>
    <label for='duree'>Durée(min)</label><br>
    <input type='number' id='duree' name='duree' required><br>
    <label for='resume'>Résumé</label><br>
    <textarea id='resume' name='resume' rows='4' cols='30' placeholder='Résumé du film ...'></textarea><br>
    <label for='inProjection'>In projection </label>
    <select name='inProjection' id='inProjection'>
      <option value='1'>Yes</option>
      <option value='0'>No</option>
    </select><br><br>
    <input type='submit' id='sbmt' value='submit'><br><br>
    <a href='login.php'><input type='button' id='return' value='return'></a>
  </fieldset></form>";
  unset($conn);
} catch(PDOException $err) {
  echo "Connection failed: "  .$err->getMessage()."<br>";
  die();
}
echo $form;
?>
</body>
</html>
