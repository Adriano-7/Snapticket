<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/department.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');


$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!$client->isAdmin || $_SESSION['csrf'] !== $_POST['csrf']){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!isset($_POST['title'])) {
    header('Location: ../../pages/createDepartment.php?error=missing_title');
    die();
}

if (!isset($_FILES['image'])) {
    header('Location: ../../pages/createDepartment.php?error=missing_image');
    die();
}

$title = htmlspecialchars($_POST['title']);
$members = htmlspecialchars($_POST['members']);
$image = $_FILES['image'];

if (!preg_match('/^[a-zA-Z0-9 ]+$/', $title)) {
    header('Location: ../../pages/createDepartment.php?error=invalid_title');
    die();
}

if (!preg_match('/^[0-9,]+$/', $members)) {
    header('Location: ../../pages/createDepartment.php?error=invalid_members');
    die();
}

if (!preg_match('/^image\/(jpeg|png|svg|jpg)$/', $image['type'])) {
    header('Location: ../../pages/createDepartment.php?error=invalid_image');
    die();
}

$members = explode(',', $members);

Department::createDepartment($db, $title, $members, $image);
header('Location: ../../pages/departments.php');
?>