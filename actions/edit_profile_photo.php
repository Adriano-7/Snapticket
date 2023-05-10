<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

$image = $_FILES['image']['tmp_name'];
$image_blob = file_get_contents($image);

$client->changeProfilePhoto($db, $image_blob);

header('Location: ../pages/profile.php')
?>