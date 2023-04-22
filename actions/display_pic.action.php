<?php 
    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/php_classes/client.class.php');

    $db = connectToDatabase();
    $imageData = Client::getProfileImage($db, $session->getUsername());
    if (!$imageData) {
        $defaultImage = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
        $imageData = file_get_contents($defaultImage);
    }
    header('Content-Type: image/jpeg');
    echo $imageData;
?>
