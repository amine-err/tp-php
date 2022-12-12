<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $password = $_POST["password"];
  if ($login=="user" && $password=="1234") {
    setcookie("login", $login, time()+3600);
    setcookie("password", $password, time()+3600);
    header('Location: session.php');
    exit();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Page d’authentification</title>
</head>
<body>
  <h1>Page d’authentification</h1>
  <form id="frm" action="login.php" method="post">
    <fieldset>
      <label for="login">Login</label><br>
      <input type="text" id="login" name="login" required><br>
      <label for="password">Mot de passe</label><br>
      <input type="password" id="password" name="password" required><br>
      <input type="submit" id="sbmt" value="submit"><br>
    </fieldset>
  </form>
</body>
</html>
