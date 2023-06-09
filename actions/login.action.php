<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');


$db = connectToDatabase();

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$client = Client::getClientWithPassword($db, $username, $password);

if ($client) {
    $session->setUserId($client->user_id);
    $session->setSuccessLogin();
    header('Location: ../pages/dashboard.php');
} 
else {
    $session->setFailedLogin();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>