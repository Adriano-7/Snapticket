<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();

if (Client::usernameExists($db, $_POST['username'])) {
    $session->setDuplicateUsername();
    header('Location: ../pages/register.php');
}

Client::register($db, $_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);

$session->setUsername($_POST['username']);
$session->setSuccessRegister();
header('Location: ../pages/dashboard.php');
?>