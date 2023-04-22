<?php function drawChangePic() { ?>
    <form action="../actions/change_pic.action.php" method="post">
        <input type="file" name="image" accept=".jpg">
        <input type="submit" value="Upload">
      </form>
    </main>
  </body>
</html>
<?php } ?>

<?php function drawLogOut() { ?>
    <main class="main_content">
      <form action="../actions/logout.action.php" method="post">
        <button type="submit" class="logout">Log Out</button>
      </form>
<?php } ?>