<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/form.tpl.php');

require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../database/php_classes/department.class.php');
require_once(__DIR__ . '/../database/php_classes/hashtag.class.php');


$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if (!isset($_GET['ticket_id'])) {
    header('Location: ../../pages/errorPage.php');
    die();
}

$ticket_id = htmlentities($_GET['ticket_id']);
$isAuthorised = Ticket::isAuthorized($db, intval($ticket_id), $client->user_id) && $client->isAgent;

if (!preg_match('/^[0-9]+$/', $ticket_id) || !$isAuthorised) {
    header('Location: ../../pages/errorPage.php');
    die();
}

$ticket = Ticket::getTicket($db, intval($ticket_id));

$departments = Department::getDepartments($db);
$hashtags = Hashtag::getAllHashtags($db);
$agents = Client::getAllAgents($db);
$error = isset($_GET['error']);

createHead("Editing ticket #".$ticket->ticket_id, ['style','form'], ['form']);
drawMenu($db, $client);
drawEditTicketForm($departments, $hashtags, $agents, $error, $ticket);
?>