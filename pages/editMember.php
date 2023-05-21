<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/profile.tpl.php');
require_once(__DIR__ . '/../templates/common.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$session = new Session();

$id = htmlspecialchars($_GET['id']);
if (!isset($id) || empty($id) || !preg_match('/^[0-9]+$/', $id)) {
    header('Location: /../../pages/errorPage.php');
}

$client = Client::getClient($db, $session->getUserId(), null);
$target = Client::getClient($db, intval($id), NULL);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if($target===NULL || !$client->isAdmin && $client->user_id != $target->user_id) {
  header('Location: /../../pages/errorPage.php');
  die();
}

createHead('Profile', ['style', 'profile'], ['editMember', 'profile']);
drawMenu($db, $client);
drawUserInfo($db, $target);

drawEditName($target);
drawEditUsername($target);
drawRole($target);
drawEditEmail($target);
drawChangeProfilePic($target);
?>