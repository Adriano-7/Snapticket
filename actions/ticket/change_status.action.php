<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if (!isset($_POST['ticket_id']) || !isset($_POST['status']) || !$client->isAgent) {
    header('Location: ../../pages/error_page.php');
    die();
}

$ticket_id = htmlspecialchars($_POST['ticket_id']);
$status = htmlspecialchars($_POST['status']);

if (!preg_match('/^(Open|Assigned|Closed)$/', $status) || !preg_match('/^[0-9]+$/', $ticket_id) || !Ticket::isAuthorized($db, intval($ticket_id), $client->user_id)) {
    header('Location: ../../pages/error_page.php');
    die();
}

$ticket = Ticket::getTicket($db, intval($ticket_id));
$ticket->changeStatus($db, $status);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
