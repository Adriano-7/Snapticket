<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/members.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/department.class.php');

require_once(__DIR__ . '/../api/filter_members.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);
$departments = Department::getDepartments($db);
$roles = ['Admin', 'Agent', 'User'];

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if(!$client->isAdmin){
  header('Location: error_page.php');
  die();
}

$members = $client->searchClients($db, new MemberFilters());

createHead('Members', ['style', 'members'], ['members-search', 'script']);
drawMenu($db, $client);
drawSearchFilters($departments, $roles);
drawMembersTable($db, $members);
?>