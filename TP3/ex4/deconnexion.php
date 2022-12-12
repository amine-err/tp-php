<?php
setcookie("login", "", time()- 1000);
setcookie("password", "", time()- 1000);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Deconnexion</title>
</head>
<body>
<?php
header('Location: login.php');
exit();
?>
</body>
</html>
