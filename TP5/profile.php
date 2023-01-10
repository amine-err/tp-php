<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['profile'])) {
    if($_SESSION['profile']['type']=='admin') {
      echo "Hello ".$_SESSION['profile']['type']." ".$_SESSION['profile']['username']."<br>";
      echo "<a href='show.php'><button>show movies</button></a> ";
      echo "<a href='add.php'><button>add movie</button></a> ";
      echo "<a href='edit.php'><button>edit movie genre</button></a><br><br>";
      echo "<a href='logout.php'><button>logout</button></a>";
    } elseif ($_SESSION['profile']['type']=='user') {
      echo "Hello ".$_SESSION['profile']['type']." ".$_SESSION['profile']['username']."<br>";
      echo "<a href='show.php'><button>show movies</button></a><br><br>";
      echo "<a href='logout.php'><button>logout</button></a>";
    }
} else {
  echo "You are not logged in!  <br>";
  echo "<a href='logout.php'><button>return</button></a>";
  exit();
}
?>
</body>
</html>
