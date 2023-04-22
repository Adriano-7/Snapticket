<?php 
  declare(strict_types = 1); 
  require_once(__DIR__ . '/../utils/session.php')
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

<?php function drawMenu(string $cur_page, string $user_type) { ?> 
  <body>
    <header class="menu">
      <div class="menu_header">
        <img src="../assets/logo.png" alt="SnapTicket Logo" class="logo" />
        <label for="menu-toggle" class="menu-icon"></label>
        <input type="checkbox" id="menu-toggle" />
      </div>
      <nav>
        <?php if ($cur_page == 'dashboard') { ?>
          <a href="tickets_dashboard.php" class="tickets-menu" style="color: white">Tickets</a>
        <?php } else { ?>
        <a href="tickets_dashboard.php" class="tickets-menu" style="color: #808080">Tickets</a>
        <?php } ?>

        <?php if($cur_page == 'faq') { ?>
          <a href="faq.php" class="faq-menu" style="color: white">Faq</a>
        <?php } else { ?>
          <a href="faq.php" class="faq-menu" style="color: #808080">Faq</a>
        <?php } ?>

        <?php if($user_type != 'admin') { ?>
          <?php if($cur_page == 'notifications') { ?>
            <a href="notifications.php" class="notifications-menu" style="color: white">Notifications</a>
          <?php } else { ?>
            <a href="notifications.php" class="notifications-menu" style="color: #808080">Notifications</a>
          <?php } ?>
        <?php } ?>

        <?php if($user_type == 'admin') { ?>
          <?php if($cur_page == 'members') { ?>
            <a href="members.php" class="members-menu" style="color: white">Members</a>
          <?php } else { ?>
            <a href="member.php" class="memeber-menu" style="color: #808080">Members</a>
          <?php } ?>

          <?php if($cur_page == 'departments') { ?>
            <a href="departments.php" class="departments-menu" style="color: white">Departments</a>
          <?php } else { ?>
            <a href="departments.php" class="departments-menu" style="color: #808080">Departments</a>
          <?php } ?>
        <?php } ?>
      </nav>
      <a href="profile.php" class="profile_link">
        <div class="profile">
          <img src="../assets/profile_temp.jpg" alt="Profile image" />
          <span class="profile_name">Andrew Peterson</span>
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