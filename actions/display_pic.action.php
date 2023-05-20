<?php
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/php_classes/file.class.php');

$id = isset($_GET['id']) ? htmlentities($_GET['id']) : '';

if ($id !== '') {
    $db = connectToDatabase();
    $file = File::getFile($db, $id);
    if ($file === null) {
        $defaultImagePath = __DIR__ . '/../assets/profile_pics_examples/default.jpg';
        readfile($defaultImagePath);
    }
    else {
        header('Content-Type: image/'. $file->file_type);
        header('Content-Length: ' . strlen($file->content));
        echo $file->content;
    }
}