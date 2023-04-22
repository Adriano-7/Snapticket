<?php 
    declare(strict_types = 1);
    
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    require_once(__DIR__ . '/../database/connection.db.php');
    
    $db = connectToDatabase();
    $username = $session->getUsername();
    if(isset($_POST['submit'])){
        $profile_image = file_get_contents($_FILES['image']['tmp_name']);
        if(pathinfo($_FILES['username_pic']['name'], PATHINFO_EXTENSION) == 'jpg'){
            Client::alterProfileImage($db, $username, $profile_image);
            header('Location: ../pages/profile.php');
        }
        echo 'Invalid file type';
        header('Location: ../pages/profile.php');
    }
?>
