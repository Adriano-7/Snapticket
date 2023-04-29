<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/notifications.class.php');

$db = connectToDatabase();

$notification_id = intval($_GET['notification_id']);
if (!isset($notification_id) || empty($notification_id)) {
    header('Location: ../pages/dashboard.php');
}

$notification = Notification::getNotification($db, $notification_id);
$isAuthorised = Notification::isAuthorised($db, $notification, $session->getUsername());

if (!$isAuthorised) {
    header('Location: ../pages/notifications.php');
    die();
}

Notification::setVisited($db, $notification_id);
header('Location: ../pages/ticket.php?ticket_id=' . $notification->ticket_id);
?>
