<?php
declare(strict_types=1);
require_once 'client.class.php';

class Ticket{
    public int $ticket_id;
    public string $ticket_name;
    public string $date;
    public string $priority;
    public ?Client $assignee;
    public string $status;
    public ?Client $creator;


    public function __construct(int $ticket_id, string $ticket_name, string $date, string $priority, ?Client $assignee, string $status, ?Client $creator){
        $this->ticket_id = $ticket_id;
        $this->ticket_name = $ticket_name;
        $this->date = $date;
        $this->priority = $priority;
        $this->assignee = $assignee;
        $this->status = $status;
        $this->creator = $creator;
    }

    static function getTickets(PDO $db, string $username): array{
        $stmt = $db->prepare('SELECT * FROM Admin WHERE username = ?');
        $stmt->execute([$username]);
        if($stmt->fetch()){
            $stmt = $db->prepare('SELECT * FROM Ticket');
            $stmt->execute();
            $tickets = $stmt->fetchAll();
            $client_tickets = array();
            foreach($tickets as $ticket){
                $creator = Client::getClient($db, $ticket['creator']);
                $assignee = Client::getClient($db, $ticket['assignee']);
                $client_tickets[] = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator);
            }
            return $client_tickets;
        }

        $stmt = $db->prepare('SELECT * FROM Agent WHERE username = ?');
        $stmt->execute([$username]);
        if($stmt->fetch()){
            $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id IN (SELECT ticket_id FROM TicketDepartment WHERE name_department IN (SELECT name_department FROM AgentDepartment WHERE username = ?))');
            $stmt->execute([$username]);
            $tickets = $stmt->fetchAll();
            $client_tickets = array();
            foreach($tickets as $ticket){
                $creator = Client::getClient($db, $ticket['creator']);
                $assignee = Client::getClient($db, $ticket['assignee']);
                $client_tickets[] = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator);
            }
            return $client_tickets;
        }

        $stmt = $db->prepare('SELECT * FROM Ticket WHERE creator = ?');
        $stmt->execute([$username]);
        $tickets = $stmt->fetchAll();
        $client_tickets = array();
        foreach($tickets as $ticket){
            $creator = Client::getClient($db, $ticket['creator']);
            $assignee = Client::getClient($db, $ticket['assignee']);
            $client_tickets[] = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator);
        }
        return $client_tickets;
    }

    public function getDepartment(PDO $db): string{
        $stmt = $db->prepare('SELECT name_department FROM TicketDepartment WHERE ticket_id = ?');
        $stmt->execute([$this->ticket_id]);
        $department = $stmt->fetch();
        return $department['name_department'] ?? '';
    }

    static public function getTicket(PDO $db, int $ticket_id): ?Ticket{
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = ?');
        $stmt->execute([$ticket_id]);
        $ticket = $stmt->fetch();
        if(!$ticket){
            return null;
        }
        $creator = Client::getClient($db, $ticket['creator']);
        $assignee = Client::getClient($db, $ticket['assignee']);
        return new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator);
    }
    
    static public function isAuthorized(PDO $db, int $ticket_id, string $creator): bool{
        //The user is admin
        $stmt = $db->prepare('SELECT * FROM Admin WHERE username = ?');
        $stmt->execute([$creator]);
        if($stmt->fetch()){
            return true;
        }

        //The ticket belongs to the department of the agent
        $stmt = $db->prepare('SELECT * FROM AgentDepartment WHERE username = ? AND name_department = (SELECT name_department FROM TicketDepartment WHERE ticket_id = ?)');
        $stmt->execute([$creator, $ticket_id]);
        if($stmt->fetch()){
            return true;
        }

        //The client created / was assigned the ticket
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = ? AND creator = ?');
        $stmt->execute([$ticket_id, $creator]);
        if($stmt->fetch()){
            return true;
        }
        return false;
    }

    static public function searchTickets(PDO $db, string $search): array{
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_name LIKE ?');
        $stmt->execute(['%' . $search . '%']);
        $tickets = $stmt->fetchAll();
        $client_tickets = array();
        foreach($tickets as $ticket){
            $creator = Client::getClient($db, $ticket['creator']);
            $assignee = Client::getClient($db, $ticket['assignee']);
            $client_tickets[] = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator);
        }
        return $client_tickets;
    }
}
?>