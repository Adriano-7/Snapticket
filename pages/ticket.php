<?php
  declare(strict_types = 1);
  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/ticket.tpl.php');


  require_once(__DIR__ . '/../database/php_classes/client.class.php');
  require_once(__DIR__ . '/../database/php_classes/ticket.class.php');


  $db = connectToDatabase();
  $session = new Session();
  
  if (!$session->isLoggedIn()  || !Client::clientExists($db, $session->getUsername())) {
    header('Location: login.php');
    die();
  }
  $ticket = Ticket::getTicketById($db, $_GET['id']);
  $page_name = 'Ticket ' . $ticket->getId();

  createHead($page_name, ['style','ticket'], ['menu-colors']);
  drawMenu(Client::getClientName($db, $session->getUsername()), $db);
  
  drawTitle($ticket, $db);
  drawComments($ticket, $db);

  drawFooter();

?>