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
    header('Location: ../../pages/error_page.php');
    die();
}

if (!isset($_POST['department_id'])) {
    header('Location: ../../pages/error_page.php');
    die();
}

$department_id = htmlspecialchars($_POST['department_id']);

if (!preg_match('/^[0-9]+$/', $department_id) || !Department::exists($db, intval($department_id))) {
    header('Location: ../../pages/error_page.php');
    die();
}

if (!isset($_POST['title'])) {
    header('Location: ../../pages/editDepartment.php?department='.$department_id.'&error=missing_title');
    die();
}

if (!isset($_FILES['image'])|| $_FILES['image']['size'] === 0) {
    $image = NULL;
}
else{
    $image = $_FILES['image'];
    if (!preg_match('/^image\/(jpeg|png|svg|jpg)$/', $image['type'])) {
        header('Location: ../../pages/editDepartment.php?department='.$department_id.'&error=invalid_image');
        die();
    }
}

$title = htmlspecialchars($_POST['title']);
$members = htmlspecialchars($_POST['members']);

if (!preg_match('/^[a-zA-Z0-9 ]+$/', $title)) {
    header('Location: ../../pages/editDepartment.php?department='.$department_id.'&error=invalid_title');
    die();
}

if (!empty($members) && !preg_match('/^[0-9,]+$/', $members)) {
    header('Location: ../../pages/createDepartment.php?editDepartment.php?department='.$department_id.'&error=invalid_members');
    die();
}

if(empty($members)){$members = array();}
else{$members = explode(',', $members);}

Department::editDepartment($db, $title, $members, $image, intval($department_id));
header('Location: ../../pages/departments.php');
?>