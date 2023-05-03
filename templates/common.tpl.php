<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');
?>

<?php function createHead(string $title, array $stylesheets = [], array $javascript_files = [])
{ ?>
  <!DOCTYPE html>
  <html lang="en-US">

  <head>
    <title>SnapTicket -
      <?= $title ?>
    </title>
    <link rel="icon" href="../assets/favicon.png">
    <?php foreach ($stylesheets as $stylesheet) { ?>
      <link href="../css/<?= $stylesheet ?>.css" rel="stylesheet">
    <?php } ?>
    <?php foreach ($javascript_files as $javascript_file) { ?>
      <script src="../js/<?= $javascript_file ?>.js" defer></script>
    <?php } ?>
  </head>
<?php } ?>

<?php function drawMenu(Client $client)
{ ?>

  <body>
    <header class="menu">
      <div class="menu_header">
        <a href="../pages/dashboard.php">
          <img src="../assets/logo.png" alt="SnapTicket Logo" class="logo" />
        </a>
      </div>
      <nav>
        <?php if ($_SERVER['REQUEST_URI'] == '/pages/dashboard.php') { ?>
        <a href="dashboard.php" style="color:#FFFFFF">
          <img src="../assets/menu_icons/dashboard-white-icon.svg" alt="Dashboard" class="menu-icon" />
          Dashboard
        </a>
        <?php } else { ?>
        <a href="dashboard.php" style="color:#808080">
          <img src="../assets/menu_icons/dashboard-gray-icon.svg" alt="Dashboard" class="menu-icon" />
          Dashboard
        </a>
        <?php } ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/pages/faq.php') { ?>
        <a href="faq.php" style="color:#FFFFFF">
          <img src="../assets/menu_icons/faq-white-icon.svg" alt="Faq" class="menu-icon" />
          FAQ
        </a>
        <?php } else { ?>
        <a href="faq.php" style="color:#808080">
          <img src="../assets/menu_icons/faq-gray-icon.svg" alt="Faq" class="menu-icon" />
          FAQ
        </a>
        <?php } ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/pages/notifications.php') { ?>
        <a href="notifications.php" style="color:#FFFFFF">
          <img src="../assets/menu_icons/notifications-white-icon.svg" alt="Notifications" class="menu-icon" />
          Notifications
        </a>
        <?php } else { ?>
        <a href="notifications.php" style="color:#808080">
          <img src="../assets/menu_icons/notifications-gray-icon.svg" alt="Notifications" class="menu-icon" />
          Notifications
        </a>
        <?php } ?>
        <?php if ($client->isAdmin && $_SERVER['REQUEST_URI'] == '/pages/members.php') { ?>
        <a href="members.php" style="color:#FFFFFF">
          <img src="../assets/menu_icons/members-white-icon.svg" alt="Members" class="menu-icon" />
          Members
        </a>
        <?php } else if ($client->isAdmin) { ?>
        <a href="members.php" style="color:#808080">
          <img src="../assets/menu_icons/members-gray-icon.svg" alt="Members" class="menu-icon" />
          Members
        </a>
        <?php } ?>
        <?php if ($client->isAdmin && $_SERVER['REQUEST_URI'] == '/pages/departments.php') { ?>
        <a href="departments.php" style="color:#FFFFFF">
          <img src="../assets/menu_icons/departments-white-icon.svg" alt="Departments" class="menu-icon" />
          Departments
        </a>
        <?php } else if ($client->isAdmin) { ?>
        <a href="departments.php" style="color:#808080">
          <img src="../assets/menu_icons/departments-gray-icon.svg" alt="Departments" class="menu-icon" />
          Departments
        </a>
        <?php } ?>
      </nav>
      <a href="profile.php" class="profile_link">
        <div class="profile">
          <img src="/../actions/display_profile_pic.action.php?username=<?php echo $client->username?>" alt="Profile image" />
          <span class="profile_name">
            <?php echo $client->name ?>
          </span>
        </div>
      </a>
    </header>
  <?php } ?>

  <?php function drawFooter()
  { ?>
    <main class="main_content">
    </main>
  </body>

  </html>
<?php } ?>