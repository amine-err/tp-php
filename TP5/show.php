<!DOCTYPE html>
<html>
<head>
  <title>Show movies</title>
</head>
<body>
<?php
require_once('functions.php');
session_start();
if (isset($_SESSION["profile"])) {
  try {
    $stmt = PDOconn()->prepare("SELECT * FROM Film WHERE idGenre = :idGenre and date = :date");
    $stmt->execute();
    $stmt_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($stmt_data);
    echo "</pre>";
    subarrayTable($stmt_data);
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
