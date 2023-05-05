<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();

if (isset($_POST['email']) && !empty($_POST['email'])) {
  $name = $_POST['email'];
  Client::changeEmail($db, $session->getUsername(), $name);
  header('Location: ../pages/profile.php');
} else {
  echo "Email is empty";
}
?>