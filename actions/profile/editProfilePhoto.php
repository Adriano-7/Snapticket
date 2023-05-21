<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();



if(!isset($_FILES['image']) || !isset($_POST['user_id'])){
  header('Location: ../../pages/errorPage.php?error=missing_data');
  die();
}


$user_id = htmlentities($_POST['user_id']);
$target = Client::getClient($db, intval($user_id), null);
$client = Client::getClient($db, $session->getUserId(), NULL);

$isAuthorized = $client->isAdmin || ($client->user_id === $target->user_id);
if(!$isAuthorized || $_SESSION['csrf'] !== $_POST['csrf']){
  header('Location: ../../pages/errorPage.php?error=unauthorized');
  die();
}

$image = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];


if(!preg_match('/^image\/(jpeg|png|jpg|svg)$/', $type) || $_FILES['image']['size'] > 200000000){
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=invalid_image');
  die();
}

$image_blob = file_get_contents($image);
$target->changeProfilePhoto($db, $image_blob);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>