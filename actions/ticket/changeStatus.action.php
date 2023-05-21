<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');

if (!isset($_POST['ticket_id']) || !isset($_POST['status'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

$ticket_id = intval(htmlspecialchars($_POST['ticket_id']));
$status = htmlspecialchars($_POST['status']);
$isAuthorised = Ticket::isAuthorized($db, $ticket_id, $client->user_id) && $client->isAgent;

if (!$isAuthorised) {
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!preg_match('/^(Open|Assigned|Closed)$/', $status) || !preg_match('/^[0-9]+$/', (string) $ticket_id)) {
    header('Location: ../../pages/errorPage.php');
    die();
}

$ticket = Ticket::getTicket($db, $ticket_id);
$ticket->changeStatus($db, $status);
History::addStatusHistory($db, $ticket_id, $client->user_id, $status);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
