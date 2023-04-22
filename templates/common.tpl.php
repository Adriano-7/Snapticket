<?php 
  declare(strict_types = 1); 
  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/php_classes/client.class.php');
?>

<?php function createHead(string $title, array $stylesheets = []) { ?>
    <!DOCTYPE html>
    <html lang="en-US">
      <head>
        <title>SnapTicket - <?= $title ?></title>  
        <link rel="icon" href="../assets/favicon.png">
        <?php foreach ($stylesheets as $stylesheet) { ?>
          <link href="../css/<?= $stylesheet ?>.css" rel="stylesheet">
        <?php } ?>
      </head>
<?php } ?>

<?php function drawMenu(string $user_name, PDO $db) { ?> 
  <body>
    <header class="menu">
      <div class="menu_header">
        <img src="../assets/logo.png" alt="SnapTicket Logo" class="logo" />
        <label for="menu-toggle" class="menu-icon"></label>
        <input type="checkbox" id="menu-toggle" />
      </div>
      <nav>
          <a href="tickets_dashboard.php" class="tickets-menu" style="color: white">Tickets</a>
          <a href="faq.php" class="faq-menu" style="color: #808080">Faq</a>
          <a href="notifications.php" class="notifications-menu" style="color: #808080">Notifications</a>
          <a href="profile.php" class="profile_link">
      </nav>
            <div class="profile">
              <img src="/../actions/display_pic.action.php" alt="Profile image" />
              <span class="profile_name"><?php echo $user_name ?></span>
            </div>  
      </a>   
    </header>
<?php } ?>

<?php function drawFooter() { ?>
    <main class="main_content">
      </main>
    </body>
  </html>
<?php } ?>