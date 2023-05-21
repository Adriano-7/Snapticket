<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');

require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../../database/php_classes/comment.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!isset($_POST['ticket_id']) || !isset($_POST['comment'])){
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$ticket_id = htmlspecialchars($_POST['ticket_id']);
$comment = htmlspecialchars($_POST['comment']);

$isAuthorised = Ticket::isAuthorized($db, intval($ticket_id), $client->user_id);
if (!$isAuthorised) {
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!preg_match('/^[0-9]+$/', $ticket_id) || !Ticket::isAuthorized($db, intval($ticket_id), $client->user_id)) {
    header('Location: ../../pages/errorPage.php?error=invalid_data');
    die();
}

$ticket = Ticket::getTicket($db, intval($ticket_id));
Comment::writeComment($db, $ticket->ticket_id, $client->user_id, $comment);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
