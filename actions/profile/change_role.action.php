<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), null);

if (!isset($_POST['id']) || !isset($_POST['role'])) {
  header('Location: ../../pages/members.php');
  die();
}

$id = htmlentities($_POST['id']);
$role = htmlentities($_POST['role']);

if (!in_array($role, array('Client', 'Agent', 'Admin')) || !preg_match('/^[0-9]+$/', $id) ) {
  header('Location: ../../pages/error_page.php');
  die();
}

$target = Client::getClient($db, intval($id), NULL);

if (!$client->isAdmin || $target === NULL) {
  header('Location: ../../pages/members.php');
  die();
}

if($target->changeRole($db, $role)){
  header('Location: ../../pages/members.php');
  die();
} 
else {
  header('Location: ../../pages/error_page.php');
  die();
}
?>