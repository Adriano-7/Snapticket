<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/error.tpl.php');

$db = connectToDatabase();
$session = new Session();

$client = Client::getClient($db, $session->getUserId(), null);

createHead('Error 404', ['style']);
drawMenu($db, $client);
drawErrorAlert();
?>