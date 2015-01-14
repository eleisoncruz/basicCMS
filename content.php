<?php
  ini_set("error_reporting", E_ALL);
  ini_set("display_errors", "On");
?>
<?php require_once("connection.php"); ?>
<?php require_once("functions.php"); ?>
<?php find_selected_page(); ?>
<?php include("header.php"); ?>
<div id="sidebar">
  <ul class="main-menu">
    <?php 
    // Here the refactored navigation area which displayed in sidebar are.
    echo navigation($sel_menu, $sel_page);
    ?>
    <br />
  </ul>
</div>
<div id="page">
  <div class="contents">
    <?php
    // The actual displaying the content fields in the content area in the DOM.
      if(!is_null($sel_menu)) {
        echo "<h2>{$sel_menu['menu_name']}</h2>";
      } elseif(!is_null($sel_page)) {
        echo "<h2>{$sel_page['menu_name']}</h2>";
        echo "{$sel_page['content']}";
      } else {
        echo "<h2>Select a subject or page to edit</h2>";
      }
    ?>
  </div>
</div>
<?php require_once("footer.php"); ?>