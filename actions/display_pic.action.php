<?php
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/file.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id !== '') {
    $db = connectToDatabase();
    $imageData = File::getFile($db, $id);
    
    if ($imageData === null) {
        $defaultImagePath = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
        header('Content-Type: image/jpeg');
        readfile($defaultImagePath);
    } 
    else {
        header('Content-Type: image/jpeg');
        echo $imageData;
    }
}