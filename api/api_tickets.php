<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/php_classes/ticket.class.php');

    $db = connectToDatabase();
    $tickets = Ticket::searchTickets($db, $_GET['search']);

    $allowedTickets = array();
    foreach ($tickets as $ticket) {
        Ticket::isAuthorized($db, $ticket->ticket_id, $session->getUsername()) ? $allowedTickets[] = $ticket : null;
    }
    
    echo json_encode($tickets);
?>