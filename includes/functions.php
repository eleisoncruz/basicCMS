<?php
// A function that usually confirm the existing of record set on every query.
function confirm_query($result_set) {
  if(!$result_set) {
    die("Error in processing database rows: " . mysql_error());
  }
}
// Gather all records in table main_menus then print it to sidebar block.
function get_all_mainMenus() {
  global $connection;
  $query = "SELECT * FROM main_menus ORDER BY position ASC";
  $menu_set = mysql_query($query, $connection);
  confirm_query($menu_set);
  return $menu_set;
}
// Gather all records in pages table.
// Using relationship of subject id to main_menus, print it under every main_menus.
function get_all_pages($subject_id) {
  global $connection;
  $query = "SELECT * FROM pages WHERE subject_id = {$subject_id} ORDER BY position ASC";
  $page_set = mysql_query($query, $connection);
  confirm_query($page_set);
  return $page_set;
}

// Get the id field then using this function to print the main_menu's menu_name in the content.
function get_menu_by_id($menu_id) {
  global $connection;
  $query = "SELECT * FROM main_menus WHERE id = {$menu_id} LIMIT 1";
  $result_set = mysql_query($query, $connection);
  confirm_query($result_set);
  // If no rows are returned, fetch_array will return false
  if($menu = mysql_fetch_array($result_set)) {
    return $menu;
  } else {
    return NULL;
  }
}

// Get the id field then using this function to print the page's menu_name in the content.
function get_page_by_id($page_id) {
  global $connection;
  $query = "SELECT * FROM pages WHERE id = {$page_id} LIMIT 1";
  $result_set = mysql_query($query, $connection);
  confirm_query($result_set);
  // If no rows are returned, fetch_array will return false
  if($page = mysql_fetch_array($result_set)) {
    return $page;
  } else {
    return NULL;
  }
}

// Declaring variables need for selecting menus (for bolding in every clicks), printing to the content,
// and confirming if both tables have records to be shown.
function find_selected_page() {
  global $sel_menu;
  global $sel_page;
  if(isset($_GET['menu'])) {
    $sel_menu = get_menu_by_id($_GET['menu']);
    $sel_page = NULL;
  } elseif (isset($_GET['page'])) {
    $sel_menu = NULL;
    $sel_page = get_page_by_id($_GET['page']);
  } else {
    $sel_menu = NULL;
    $sel_page = NULL;
  }
}
//  The refactored navigation menus.  class=selected is created for making bold fonts in every mouse clicks.
//  It also has urlencode that need to fetch the id from the URL in order to use the function find_selected_page,
//  get_page_by_id, and get_menu_by_id for displaying the content fields in the content area.
function navigation($sel_menu, $sel_page) {
  $menu_set = get_all_mainMenus();
    while($menu = mysql_fetch_array($menu_set)) {
      echo "<li";
      if($menu['id'] == $sel_menu['id']) {
        echo " class=\"selected\"";
      }
      echo "><a href=\"content.php?menu=" . urlencode($menu['id']) . "\">{$menu['menu_name']}</a></li>";
      $page_set = get_all_pages($menu["id"]);
      echo "<ul class=\"page-menu\">";
      while($page = mysql_fetch_array($page_set)) {
        echo "<li";
        if($page['id'] == $sel_page['id']) {
          echo " class=\"selected\"";
        }
        echo "><a href=\"content.php?page=" . urlencode($page['id']) . "\">{$page["menu_name"]}</a></li>";
      }
      echo "</ul>";
    }
  }
?>