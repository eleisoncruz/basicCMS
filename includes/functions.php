<?php
// This the file for all necessary functions for this project.

// This is to confirm the query if it is not NULL or empty
function confirm_query($result_set) {
  if(!$result_set) {
    die("Unable to proceed to the table records.  Maybe it's NULL or empty. " + mysql_error());
  }
}
// This will retrieve all records from main_menus table
function get_all_MainMenus() {
  global $connection;
  $query = "SELECT * FROM main_menus ORDER BY position ASC";
  $mainMenus_set = mysql_query($query, $connection);
  confirm_query($mainMenus_set);
  return $mainMenus_set;
}
// This will retrieve all records from pages_table but will use the subject_id field
function get_pages_mainMenus($subject_id) {
  global $connection;
  $query = "SELECT * FROM pages WHERE subject_id = {$subject_id}";
  $pages_set = mysql_query($query, $connection);
  confirm_query($pages_set);
  return $pages_set;
}
?>