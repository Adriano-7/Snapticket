<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/dashboard.tpl.php');
require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../api/filterTickets.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn() || $client === null) {
  header('Location: login.php');
  die();
}

if(isset($_GET['username'])){
  $username = htmlspecialchars($_GET['username']);
  if(preg_match('/^[a-zA-Z0-9_]+$/', $username)){
    $target = Client::getClient($db, null, $username);
    $tickets = Ticket::getTickets($db, $target->user_id);
    
  }
  else{
    header('Location: dashboard.php');
    die();
  }
}

else{
  $tickets = Ticket::searchTickets($db, new TicketFilters(), $client);
}

$departments = Ticket::getDepartments($tickets);
$status = Ticket::getStatuses($tickets);
$assignee = Ticket::getAssignees($tickets);
$hashtags = Ticket::getHashtags($tickets);

createHead('Dashboard', ['style', 'dashboard'], ['ticketsSearch']);
drawMenu($db, $client);
drawSearchBar($departments, $status, $assignee, $hashtags);
drawTicketsTable($tickets, $db);
?>
