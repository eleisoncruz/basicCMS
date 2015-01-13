<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
    <div id="sidebar">
      <ul class="mainMenus">
        <?php
          $mainMenus_set = get_all_mainMenus();
          while($mainMenus = mysql_fetch_array($mainMenus_set)) {
            echo"<li><a href=\"content.php?menu=" . urlencode($mainMenus["id"]) . "\">{$mainMenus["menu_name"]}</li>";
            $pages_set = get_pages_mainMenus($mainMenus["id"]);
            echo "<ul class=\"pages\">";
            while($pages = mysql_fetch_array($pages_set)) {
              echo "<li><a href=\"content.php?pages=" . urlencode($pages["id"]) . "\" >{$pages["menu_name"]}</a></li>";
            }
            echo "</ul>";
          }
        ?>
      </ul>
    </div>
    <div id="content">
      <h3>Body</h3>
    </div>
    <?php include("includes/footer.php"); ?>