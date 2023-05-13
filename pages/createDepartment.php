<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/createForm.tpl.php');

require_once(__DIR__ . '/../database/php_classes/department.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

$clients = Client::getClients($db);
$error = isset($_GET['error']);

createHead("Create a department", ['style','createForm'], ['createForm']);
drawMenu($db, $client);

drawDepartmentForm($clients, $error);
?>