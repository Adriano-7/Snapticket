<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();

$name = htmlspecialchars($_POST['name']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if (Client::usernameExists($db, $username)) {
    $session->setDuplicateUsername();
    header('Location: ../pages/register.php');
}

if(preg_match('/^[a-zA-Z][a-zA-Z0-9._]+$/', $username) === 0 || preg_match('/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/', $email) === 0 || preg_match('/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/', $password) === 0) {
    header('Location: ../pages/register.php');
}


Client::register($db, $name, $username, $email, $password);
$client = Client::getClient($db, null, $username);

$session->setUserId($client->user_id);
$session->setSuccessRegister();
header('Location: ../pages/dashboard.php');
?>