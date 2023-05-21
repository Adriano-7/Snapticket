<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');

require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../../database/php_classes/comment.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');
require_once(__DIR__ . '/../../database/php_classes/hashtag.class.php');
require_once(__DIR__ . '/../../database/php_classes/history.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if (!isset($_POST['title']) || !isset($_POST['ticket_id'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$title = htmlspecialchars($_POST['title']);
$department = htmlspecialchars($_POST['departments']  ?? '');
$hashtag = htmlspecialchars($_POST['hashtags']  ?? '');
$priority = htmlspecialchars($_POST['priority']  ?? '');
$assignee = htmlspecialchars($_POST['assignee']  ?? '');
$ticket_id = intval(htmlspecialchars($_POST['ticket_id']  ?? '-1'));

$isAuthorised = Ticket::isAuthorized($db, $ticket_id, $client->user_id) && $client->isAgent;

if(!$isAuthorised || $_SESSION['csrf'] !== $_POST['csrf']){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if(!preg_match('/^[0-9]+$/', (string)$ticket_id) || !preg_match('/^[0-9,]*$/', $department) || !preg_match('/^(Low|Medium|High|)$/', $priority) || !preg_match('/^[0-9]*$/', $assignee)){
    header('Location: ../../pages/errorPage.php?error=invalid_data');
    die();
}

$department = $department != '' ? explode(',', $department) : [];
$hashtags = $hashtag != '' ? explode(',', $hashtag) : [];

$ticket = Ticket::getTicket($db, intval($ticket_id));
$ticket->alterTicket($db, $title, $department, $priority, intval($assignee), $hashtags);
History::addEditHistory($db, intval($ticket_id), $client->user_id);

header('Location: ../../pages/ticket.php?ticket_id=' . $ticket_id);
?>
