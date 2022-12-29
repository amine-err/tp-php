<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Show movies</title>
</head>
<body>
<?php
require_once('f_arrayTable.php');
session_start();
if (isset($_SESSION["profile"])) {
  $server = "localhost"; $user = "root"; $pass = ""; $db = "VideoLibrary";
  try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $stmt = $conn->prepare("SELECT * FROM Film");
    $stmt->execute();
    $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo arrayTable($stmt_data);
    echo "<br><a href='login.php'><button>return</button></a> ";
    unset($conn);
  } catch(PDOException $err) {
    echo "Connection failed: ".$err->getMessage()."<br>";
    die();
  }
} else {
  echo "You need to be logged in!<br>";
  echo "<a href='login.php'><button>login</button></a> ";
  exit();
}
?>
</body>
</html>
