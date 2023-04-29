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

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

$tickets = Ticket::getTickets($db, $session->getUsername());

createHead('Dashboard', ['style', 'dashboard'], ['page_exists']);
drawMenu(Client::getClientName($db, $session->getUsername()), $db);
drawSearchBar();
drawTicketsTable($tickets, $db);
?>