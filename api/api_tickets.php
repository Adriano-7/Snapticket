<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    
    require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
    require_once(__DIR__ . '/../database/php_classes/client.class.php');

    require_once(__DIR__ . '/filter_tickets.php');

    $db = connectToDatabase();
    $client = Client::getClient($db, $session->getUserId(), null);

    $search = isset($_GET['search']) ? $_GET['search'] : "";
    $dept = isset($_GET['dept']) ? $_GET['dept'] : "";
    $status = isset($_GET['status']) ? $_GET['status'] : "";
    $priority = isset($_GET['priority']) ? $_GET['priority'] : "";
    $assignee = isset($_GET['assignee']) ? $_GET['assignee'] : "";
    $hashtag = isset($_GET['hashtag']) ? $_GET['hashtag'] : "";

    $orderId = isset($_GET['orderId']) ? $_GET['orderId'] : "";
    $orderAssignee = isset($_GET['orderAssignee']) ? $_GET['orderAssignee'] : "";
    $orderDescription = isset($_GET['orderDescription']) ? $_GET['orderDescription'] : "";

    $tickets = Ticket::searchTickets($db, new TicketFilters($search, $dept, $status, $priority, $assignee, $hashtag, $orderId, $orderAssignee, $orderDescription), $client);
    
    echo json_encode($tickets);
?>
