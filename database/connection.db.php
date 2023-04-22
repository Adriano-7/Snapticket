<?php 
    declare(strict_types = 1);
    function connectToDatabase(): PDO {
        $db = new PDO('sqlite:' . __DIR__ . '/../database/database.db');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $db;
    }    
    function getProfileImage(PDO $db, string $username): ?string{
        $stmt = $db->prepare("SELECT user_image FROM Client WHERE username = :username");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($result['user_image']) ? $result['user_image'] : null;
    }
?>