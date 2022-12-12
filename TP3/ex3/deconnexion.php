<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Deconnexion</title>
</head>
<body>
<?php
session_destroy();
header('Location: login.php');
exit();
?>
</body>
</html>
