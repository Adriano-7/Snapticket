<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');

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

createHead('Notifications', ['style']);
drawMenu($db, $client);
drawFooter();
?>