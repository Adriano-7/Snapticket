<?php 
    declare(strict_types = 1);
    
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/users.db.php');

    $db = connectToDatabase();
    $client = Client::getClientWithPassword($db, $_POST['username'], $_POST['password']);

    if($client){
        $session->setUsername($client->username);
        $session->addMessage('success', 'Login successful!');
    }
    else{
        $session->addMessage('error', 'Login failed!');
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>