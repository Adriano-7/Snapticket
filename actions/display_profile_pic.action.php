<?php
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$username = isset($_GET['username']) ? $_GET['username'] : '';

if ($username === '') {
    $defaultImagePath = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
    header('Content-Type: image/jpeg');
    readfile($defaultImagePath);
} else {
    $db = connectToDatabase();
    $imageData = getProfileImage($db, $username);
    
    if ($imageData === null) {
        $defaultImagePath = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
        header('Content-Type: image/jpeg');
        readfile($defaultImagePath);
    } else {
        header('Content-Type: image/jpeg');
        echo $imageData;
    }
}
