<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/notifications.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!isset($_GET['notification_id'])){
    header('Location: ../../pages/error_page.php?error=missing_data');
    die();
}

$notification_id = intval($_GET['notification_id']);
$notification = Notification::getNotification($db, $notification_id);

if ($notification === null) {
    header('Location: /../../pages/error_page.php?error=invalid_data');
    die();
}

$isAuthorised = Notification::isAuthorised($db, $notification, $session->getUserId());
if (!$isAuthorised) {
    header('Location: /../../pages/error_page.php?error=unauthorized');
    die();
}

Notification::eliminateNotification($db, $notification_id);
header('Location: ../../pages/notifications.php');
?>
