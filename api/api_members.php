<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/php_classes/client.class.php');
    require_once(__DIR__ . '/filter_members.php');

    $db = connectToDatabase();

    $search = isset($_GET['search']) ? $_GET['search'] : "";
    $dept = isset($_GET['dept']) ? $_GET['dept'] : "";
    $role = isset($_GET['role']) ? $_GET['role'] : "";

    $members = Client::searchClients($db, new MemberFilters($search, $dept, $role));
    
    echo json_encode($members);
?>