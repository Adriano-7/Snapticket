<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if ($_SESSION['csrf'] !== $_POST['csrf']) {
  header('Location: ../../pages/errorPage.php?error=unauthorized');
  die();
}

if (!isset($_POST['old_password']) || !isset($_POST['new_password'])) {
  header('Location: ../../pages/errorPage.php?error=missing_data');
  die();
}

$old_password = htmlentities($_POST['old_password']);
$new_password = htmlentities($_POST['new_password']);

$check = Client::getClientWithPassword($db, $client->username, $old_password);
if ($check === NULL) {
  header('Location: ../../pages/editPassword.php?error=wrong_password');
  die();
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/', $new_password)) {
  header('Location: ../../pages/editPassword.php?error=invalid_password');
  die();
}

$client->changePassword($db, $new_password);

header('Location: ../../pages/profile.php');
?>