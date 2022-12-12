<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Page à accès limité</title>
</head>
<body>
<?php
if (isset($_SESSION["login"]) && isset($_SESSION["password"])) {
  echo "<h1>Authentification succée!<br>Bonjour ".$_SESSION['login'].".</h1><br>";
  echo "<a href='deconnexion.php'><button>deconnexion</button></a>";
}
else {
  session_destroy();
  header('Location: login.php');
  exit();
}
?>
</body>
</html>
