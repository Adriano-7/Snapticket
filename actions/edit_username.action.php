<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/php_classes/client.class.php');

  $db = connectToDatabase();
  Client::changeUsername($db, $session->getUsername(), $_POST['username']);
  $session->setUsername($_POST['username']);

  header('Location: ../pages/profile.php')
?>