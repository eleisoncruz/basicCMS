<div id="footer">
      <p>This is the footer</p>
    </div>
  </body>
  <script src="script.js"></script>
</html>
<?php
// Close the connection
if (isset($connection)) {
  mysql_close($connection);
}
?>