<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/notifications.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/notifications.class.php');



$db = connectToDatabase();
$session = new Session();

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

$notifications = Notification::getNotifications($db, $session->getUsername());

createHead('Notifications', ['style', 'notifications']);
drawMenu(Client::getClient($db, $session->getUsername()));
drawNotifications($notifications);
?>