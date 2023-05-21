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

$client = Client::getClient($db, $session->getUserId(), null);
$notifications = Notification::getNotifications($db, $client->user_id);

createHead('Notifications', ['style', 'notifications']);
drawMenu($db, $client);
drawNotifications($db, $notifications);
?>