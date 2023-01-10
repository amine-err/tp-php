<?php
# For errors showing:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(E_WARNING);

# Show array as html table:
function subarrayTable($array) {
  echo "<table border=\"1\"><thead><tr>";
  foreach ($array[0] as $key => $value) {
    echo "<th>".$key."</th>"; }
  echo "</tr></thead><tbody>";
  foreach ($array as $subarray) {
    echo "<tr>";
    foreach ($subarray as $value) {
      echo "<td>".$value."</td>"; }
    echo "</tr>";
  }
  echo "</tr></tbody></table>";
}

# DB connection function:
function PDOconn() {
  $server = "localhost"; $user = "root"; $pass = ""; $db = "VideoLibrary";
  $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
  return $conn;
}
?>