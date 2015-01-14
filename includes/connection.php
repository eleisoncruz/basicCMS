<?php
require("constants.php");

$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if(!$connection) {
  die('Unable to connect to MySQL server: ' . mysql_error());
}
$db_file = mysql_select_db(DB_NAME, $connection);
if(!$db_file) {
  die("Error during connecting to the database file: " . mysql_error());
}
?>