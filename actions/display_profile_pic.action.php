<?php
require_once(__DIR__ . '/../utils/session.php');
$session = new Session();
$username = $session->getUsername();


require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$imageData = getProfileImage($db, $username);

if ($imageData === null) {
    $defaultImagePath = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
    header('Content-Type: image/jpeg');
    readfile($defaultImagePath);

} 
else {
    header('Content-Type: image/jpeg');
    echo $imageData;
}