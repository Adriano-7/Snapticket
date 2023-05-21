<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/department.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!$client->isAdmin){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!isset($_GET['department'])) {
    header('Location: ../../pages/errorPage.php?error=missing_department');
    die();
}

$department_id = htmlspecialchars($_GET['department']);

if (!preg_match('/^[0-9]+$/', $department_id) || !Department::exists($db, intval($department_id))){
    header('Location: ../../pages/errorPage.php?error=invalid_data');
    die();
}

Department::removeDepartment($db, intval($department_id));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>