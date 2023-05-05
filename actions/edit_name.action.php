<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();

if (isset($_POST['name']) && !empty($_POST['name'])) {
  $name = $_POST['name'];
  Client::changeName($db, $session->getUsername(), $name);
  header('Location: ../pages/profile.php');
} 
else {
  echo "Name is empty";
}
?>