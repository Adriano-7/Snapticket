<?php 
    declare(strict_types = 1);
    
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    if ($session->isLoggedIn()) {
        header('Location: login.php');
        exit();
    }

    header('Location: tickets_dashboard.php');
?>