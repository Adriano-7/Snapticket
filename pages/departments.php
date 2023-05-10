<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../database/php_classes/department.class.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/departments.tpl.php');


$db = connectToDatabase();
$session = new Session();

$client = Client::getClient($db, $session->getUserId(), null);
$departments = Department::getDepartments($db);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if(!$client->isAdmin){
  header('Location: error_page.php');
  die();
}

createHead('Notifications', ['style', 'departments']);
drawMenu($db, $client);
drawCreateDept();
drawCards($departments);
?>