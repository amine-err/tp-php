<!DOCTYPE html>
<html>
<head>
  <title>Page à accès limité</title>
</head>
<body>
<?php
if (isset($_COOKIE["login"]) && isset($_COOKIE["password"])) {
  echo "<h1>Authentification succée!<br>Bonjour ".$_COOKIE['login'].".</h1><br>";
  echo "<a href='deconnexion.php'><button>deconnexion</button></a>";
}
else {
  header('Location: deconnexion.php');
  exit();
}
?>
</body>
</html>
