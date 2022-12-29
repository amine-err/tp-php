<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
if (isset($_SESSION['profile']) and $_SESSION['profile'][0]=='admin') {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost"; $user = "root"; $pass = ""; $db = "VideoLibrary";
    try {
      $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
      $stmt = $conn->prepare("UPDATE Film SET idGenre = :idGenre WHERE idFilm = :idFilm");
      $stmt->execute([ ':idGenre' => $_POST["idGenre"], ':idFilm' => $_POST["idFilm"] ]);
      echo "Film genre updated<br>";
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
  <title>Edit movie</title>
</head>
<body>
<?php
$server = "localhost"; $user = "root"; $pass = ""; $db = "VideoLibrary";
try {
  $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
  $stmt = $conn->prepare("SELECT * FROM Film");
  $stmt->execute();
  $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $form = "
  <form id='frm' action='edit.php' method='post'><fieldset>
    <label for='idFilm'>Select a Film</label><br>
    <select name='idFilm' id='idFilm'>";
  foreach ($stmt_data as $value) {
    $form .= "<option value='$value[idFilm]'>$value[titre] - $value[annee]</option>"; }
  $form .= "</select><br>";
  $stmt = $conn->prepare("SELECT * FROM Genre");
  $stmt->execute();
  $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $form .= "
    <label for='idGenre'>Change genre</label><br>
    <select name='idGenre' id='idGenre'>";
  foreach ($stmt_data as $value) {
    $form .= "<option value='$value[idGenre]'>$value[libelle]</option>"; }
  $form .= "
    </select>
    <input type='submit' id='sbmt' value='submit'><br><br>
    <a href='login.php'><input type='button' id='return' value='return'></a>
  </fieldset></form>";
  unset($conn);
} catch(PDOException $err) {
  echo "Connection failed: ".$err->getMessage()."<br>";
  die();
}
echo $form;
?>
</body>
</html>
