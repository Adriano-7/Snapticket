<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/ticket.tpl.php');


require_once(__DIR__ . '/../database/php_classes/ticket.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUsername());

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if(!isset($_GET['ticket_id'])) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  die();
}

$isAuthorised = Ticket::isAuthorized($db, intval($_GET['ticket_id']), $session->getUsername());
if (!$isAuthorised) {
  header('Location: error_page.php');
  die();
}

$ticket = Ticket::getTicket($db, $_GET['ticket_id']);
$page_name = 'Ticket ' . $ticket->ticket_id;

createHead($page_name, ['style','ticket'], ['menu-colors']);
drawMenu($db, $client);

drawTitle($ticket, $db);
drawComments($ticket, $db);

drawFooter();
?>