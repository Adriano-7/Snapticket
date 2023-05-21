<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$operator = Client::getClient($db, $session->getUserId(), NULL);

$id = htmlspecialchars($_GET['id']);

if (!isset($id) || empty($id) || !preg_match('/^[0-9]+$/', $id)) {
    header('Location: /../../pages/errorPage.php?error=invalid_data');
}

$target = Client::getClient($db, intval($id), NULL);

$isAuthorised = ($operator->isAdmin) || ($operator->user_id==$target->user_id);
if (!$isAuthorised || $_SESSION['csrf'] !== $_GET['csrf']) {
    header('Location: /../../pages/errorPage.php?error=unauthorized');
    die();
}

Client::eliminateClient($db, intval($id));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
