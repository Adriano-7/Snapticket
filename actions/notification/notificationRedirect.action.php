<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/notifications.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!isset($_GET['notification_id'])){
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$notification_id = intval($_GET['notification_id']);
$notification = Notification::getNotification($db, $notification_id);

if ($notification === null) {
    header('Location: /../../pages/errorPage.php?error=invalid_data');
    die();
}

$isAuthorised = Notification::isAuthorised($db, $notification, $client->user_id);
if(!$isAuthorised){
    header('Location: /../../pages/errorPage.php?error=unauthorized');
    die();
}

Notification::setVisited($db, $notification_id);
header('Location: ../../pages/ticket.php?ticket_id=' . $notification->ticket_id);
?>
