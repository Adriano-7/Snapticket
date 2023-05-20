<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/form.tpl.php');

require_once(__DIR__ . '/../database/php_classes/hashtag.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

$clients = Client::getClients($db);
$hashtags = Hashtag::getAllHashtags($db);

createHead("Edit Hashtag", ['style','form', 'editHashtags'], ['form', 'editHashtags']);
drawMenu($db, $client);

drawHashtagsForm($hashtags);
?>