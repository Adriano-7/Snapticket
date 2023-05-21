<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), null);

if (!isset($_POST['id']) || !isset($_POST['role'])) {
  header('Location: ../../pages/error_page.php?error=missing_data');
  die();
}

$id = htmlentities($_POST['id']);
$role = htmlentities($_POST['role']);

if (!preg_match('/^(Client|Agent|Admin|)$/', $role) || !preg_match('/^[0-9]+$/', $id) ) {
  header('Location: ../../pages/error_page.php?error=invalid_data');
  die();
}

$target = Client::getClient($db, intval($id), NULL);

if (!$client->isAdmin || $target === NULL || $_SESSION['csrf'] !== $_POST['csrf']) {
  header('Location: ../../pages/error_page.php?error=unauthorized');
  die();
}

$target->changeRole($db, $role);
header('Location: ' . $_SERVER['HTTP_REFERER']);
die();
?>