<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/form.tpl.php');

require_once(__DIR__ . '/../database/php_classes/faq.class.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if (!isset($_GET['department']) || !$client->isAdmin) {
    header('Location: ../../pages/error_page.php');
    die();
}

$department_id = htmlentities($_GET['department']);

if (!preg_match('/^[0-9]+$/', $department_id)) {
    header('Location: ../../pages/error_page.php');
    die();
}

$allClients = Client::getClients($db);
$members = Department::getMembers($db, intval($department_id));
$department = Department::getDepartment($db, intval($department_id));

createHead("Editing Department", ['style','form'], ['form', 'script']);
drawMenu($db, $client);
drawEditDepartmentForm($department, $allClients);
?>