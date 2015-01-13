<?php
// Get the necessary variables for the connection to MySQL
require("constants.php");
// Connecting to the MySQL server
$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if(!$connection) {
  die("Unable to connect to the MySQL server: " . mysql_error());
}
// Connecting to the SQL file named basiccms.sql
$db_file = mysql_select_db(DB_NAME, $connection);
if(!$db_file) {
  die("Failed to connect to SQL file named basicCMS.sql :" . mysql_error());
}
?>