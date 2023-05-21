<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/hashtag.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!$client->isAgent || $_SESSION['csrf'] !== $_POST['csrf']){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!isset($_POST['H'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$hashtags = array();

foreach ($_POST['H'] as $hashtag) {
    array_push($hashtags, htmlentities($hashtag));
}

Hashtag::editHashtags($db, $hashtags);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>