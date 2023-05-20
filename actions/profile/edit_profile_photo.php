<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();

if(!isset($_FILES['image']) || !isset($_POST['user_id'])){
  header('Location: ../../pages/error_page.php?error=missing_data');
  die();
}


$user_id = htmlentities($_POST['user_id']);
$target = Client::getClient($db, intval($user_id), null);

$image = $_FILES['image']['tmp_name'];


if(!preg_match('/^image\/(jpeg|png|jpg|svg)$/', mime_content_type($image)) || $_FILES['image']['size'] > 200000000){
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=invalid_image');
  die();
}

$image_blob = file_get_contents($image);
$target->changeProfilePhoto($db, $image_blob);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>