<?php
    declare(strict_types = 1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/php_classes/client.class.php');

    $db = connectToDatabase();

    Client::register($db, $_POST['name'], $_POST['username'], $_POST['email'], $_POST['password']);

    $session->setUsername( $_POST['username']);
    header('Location: ../pages/tickets_dashboard.php');
?>
