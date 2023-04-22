<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();
  if (!$session->isLoggedIn()) {
    header('Location: login.php');
    die();
  }

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/profile.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../database/php_classes/client.class.php');
  
  $db = connectToDatabase();

  createHead('Notifications', ['style'], ['menu-colors']);
  drawMenu(Client::getClientName($db, $session->getUsername()), $db);
  drawFooter();
?>