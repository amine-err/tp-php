<?php
require_once "functions.php";
session_start();
if (isset($_SESSION['profile'])) {
  header('Location: profile.php');
  exit();
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  try {
    $stmt = PDOconn()->prepare("SELECT * FROM utilisateur WHERE username=:username and password=:password");
    $stmt->execute([':username' => $username,':password' => $password]);
    if($stmt->rowCount()){
      $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      print_r($stmt_data);
      $_SESSION['profile']['type'] = $stmt_data[0]['type'];
      $_SESSION['profile']['username'] = $stmt_data[0]['username'];
      header('Location: profile.php');
      exit();
    } else {
      echo "wrong username and password combination!<br>";
    }
    unset($conn);
  } catch(PDOException $err) {
    echo "Connection failed: "  .$err->getMessage()."<br>";
    die();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
  <h1>Login page</h1>
  <form id="frm" action="login.php" method="post">
    <fieldset>
      <label for="username">Username</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" id="sbmt" value="login"><br>
    </fieldset>
  </form>
</body>
</html>
