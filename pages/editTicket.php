<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/editTicket.tpl.php');

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
    header('Location: ../../pages/error_page.php');
    die();
}

$ticket_id = htmlentities($_GET['ticket_id']);
if (!preg_match('/^[0-9]+$/', $ticket_id)) {
    header('Location: ../../pages/error_page.php');
    die();
}

$ticket = Ticket::getTicket($db, intval($ticket_id));

$departments = Department::getDepartments($db);
$hashtags = Hashtag::getAllHashtags($db);
$agents = Client::getAllAgents($db);
$error = isset($_GET['error']);

createHead("Editing ticket #".$ticket->ticket_id, ['style','createTicket'], ['createTicket']);
drawMenu($db, $client);
drawForm($departments, $hashtags, $agents, $error, $ticket);
?>