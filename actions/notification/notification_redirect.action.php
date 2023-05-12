<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/notifications.class.php');

$db = connectToDatabase();

$notification_id = intval($_GET['notification_id']);
if (!isset($notification_id) || empty($notification_id)) {
    header('Location: /../../pages/error_page.php');
}

$notification = Notification::getNotification($db, $notification_id);
if ($notification === null) {
    header('Location: /../../pages/error_page.php');
    die();
}

$isAuthorised = Notification::isAuthorised($db, $notification, $session->getUserId());

if($isAuthorised===false){
    header('Location: /../../pages/error_page.php');
    die();
}

Notification::setVisited($db, $notification_id);
header('Location: ../../pages/ticket.php?ticket_id=' . $notification->ticket_id);
?>
