<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if (!isset($_GET['ticket_id'])) {
    header('Location: ../../pages/error_page.php?error=missing_data');
    die();
}

$ticket_id = htmlspecialchars($_GET['ticket_id']);
$isAuthorised = Ticket::isAuthorized($db, intval($ticket_id), $client->user_id) && $client->isAgent;

if (!$isAuthorised) {
    header('Location: ../../pages/error_page.php?error=unauthorized');
    die();
}

if (!preg_match('/^[0-9]+$/', $ticket_id)) {
    header('Location: ../../pages/error_page.php?error=invalid_data');
    die();
}

Ticket::eraseTicket($db, intval($ticket_id));
header('Location: ../../pages/dashboard.php');
?>
