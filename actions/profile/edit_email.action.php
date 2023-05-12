<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if (isset($_POST['email']) && !empty($_POST['email'])) {
  $email = $_POST['email'];
  $client->changeEmail($db, $email);
  header('Location: ../pages/profile.php');
}

else {
  header('Location: ../pages/profile.php');
}
?>