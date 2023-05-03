<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/faq.class.php');

$db = connectToDatabase();
$session = new Session();

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

createHead('Notifications', ['style']);
drawMenu(Client::getClient($db, $session->getUsername()), $db);
drawFooter();
?>