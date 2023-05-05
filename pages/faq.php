<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/faq.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUsername());

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

/*
if(!isset($_GET['department']) || FAQ::isAuthorised($db, $session->getUsername(), $_GET['department'])===false) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  die();
}
*/

createHead('Notifications', ['style']);
drawMenu($db, $client);
drawFooter();
drawFAQ($FAQ, $db);
?>