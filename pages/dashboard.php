<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/dashboard.tpl.php');
require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/ticket.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUsername());

if (!$session->isLoggedIn() || $client === null) {
  header('Location: login.php');
  die();
}

$tickets = Ticket::getTickets($db, $session->getUsername());

createHead('Dashboard', ['style', 'dashboard'], ['search']);
drawMenu($client);
drawSearchBar();
drawTicketsTable($tickets, $db);
?>