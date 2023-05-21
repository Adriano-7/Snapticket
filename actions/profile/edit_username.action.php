<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();

if(!isset($_POST['username']) || !isset($_POST['user_id'])){
  header('Location: ../../pages/error_page.php?error=missing_data');
  die();
}


$user_id = htmlentities($_POST['user_id']);
$target = Client::getClient($db, intval($user_id), null);
$client = Client::getClient($db, $session->getUserId(), NULL);

$isAuthorized = $client->isAdmin || ($client->user_id === $target->user_id);
if(!$isAuthorized || $_SESSION['csrf'] !== $_POST['csrf']){
  header('Location: ../../pages/error_page.php?error=unauthorized');
  die();
}

$username = htmlentities($_POST['username']);

if(!preg_match('/^[a-zA-Z][a-zA-Z0-9._]+$/', $username) || Client::usernameExists($db, $username)){
  header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=invalid_username');
  die();
}

$target->changeUsername($db, $username);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>