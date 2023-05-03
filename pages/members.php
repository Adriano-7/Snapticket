<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUsername());

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if(!$client->isAdmin($db)){
  header('Location: error_page.php');
  die();
}

$members = $client->getMembers($db);
createHead('Members', ['style', 'members']);
drawMenu($client, $db);
drawSearchFilters();
drawMembersTable($members);
drawFooter();
?>