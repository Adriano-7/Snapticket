<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/hashtag.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!$client->isAgent){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!isset($_GET['hashtag_name'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$hashtag_name = htmlentities($_GET['hashtag_name']);

Hashtag::removeHashtag($db, $hashtag_name);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>