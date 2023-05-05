<?php
declare(strict_types=1);
require_once 'client.class.php';

class Ticket
{
    public int $ticket_id;
    public string $ticket_name;
    public string $date;
    public string $priority;
    public ?Client $assignee;
    public string $status;
    public ?Client $creator;
    public array $departments;
    public array $hashtags;


    public function __construct(int $ticket_id, string $ticket_name, string $date, string $priority, ?Client $assignee, string $status, ?Client $creator, array $departments = [], array $hashtags = []){
        $this->ticket_id = $ticket_id;
        $this->ticket_name = $ticket_name;
        $this->date = $date;
        $this->priority = $priority;
        $this->assignee = $assignee;
        $this->status = $status;
        $this->creator = $creator;
        $this->departments = $departments;
        $this->hashtags = $hashtags;
    }

    static public function isAuthorized(PDO $db, int $ticket_id, string $creator): bool{
        //The user is admin
        $stmt = $db->prepare('SELECT * FROM Admin WHERE username = ?');
        $stmt->execute([$creator]);
        if ($stmt->fetch()) {
            return true;
        }

        //The ticket belongs to the department of the agent
        $stmt = $db->prepare('SELECT * FROM CLientDepartment WHERE username = ? AND name_department = (SELECT name_department FROM TicketDepartment WHERE ticket_id = ?)');
        $stmt->execute([$creator, $ticket_id]);
        if ($stmt->fetch()) {
            return true;
        }

        //The client created / was assigned the ticket
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = ? AND creator = ?');
        $stmt->execute([$ticket_id, $creator]);
        if ($stmt->fetch()) {
            return true;
        }
        return false;
    }

    static public function searchTickets(PDO $db, TicketFilters $filters, Client $client): array{
        $query = "SELECT * FROM Ticket";
        $params = array();

        if ($filters->search != "") {
            $query .= " WHERE ticket_name LIKE ?";
            $params[] = "%" . $filters->search . "%";
        }

        if ($filters->department != "") {
            if ($filters->search == "") {
                $query .= " WHERE ticket_id IN (SELECT ticket_id FROM TicketDepartment WHERE name_department = ?)";
            } else {
                $query .= " AND ticket_id IN (SELECT ticket_id FROM TicketDepartment WHERE name_department = ?)";
            }
            $params[] = $filters->department;
        }

        if ($filters->status != "") {
            if ($filters->search == "" && $filters->department == "") {
                $query .= " WHERE status = ?";
            } else {
                $query .= " AND status = ?";
            }
            $params[] = $filters->status;
        }

        if ($filters->priority != "") {
            if ($filters->search == "" && $filters->department == "" && $filters->status == "") {
                $query .= " WHERE priority = ?";
            } else {
                $query .= " AND priority = ?";
            }
            $params[] = $filters->priority;
        }

        if ($filters->assignee != "") {
            if ($filters->search == "" && $filters->department == "" && $filters->status == "" && $filters->priority == "") {
                $query .= " WHERE assignee = ?";
            } else {
                $query .= " AND assignee = ?";
            }
            $params[] = $filters->assignee;
        }

        if ($filters->hashtag != "") {
            if ($filters->search == "" && $filters->department == "" && $filters->status == "" && $filters->priority == "" && $filters->assignee == "") {
                $query .= " WHERE ticket_id IN (SELECT ticket_id FROM TicketHashtag WHERE name = ?)";
            } else {
                $query .= " AND ticket_id IN (SELECT ticket_id FROM TicketHashtag WHERE name = ?)";
            }
            $params[] = $filters->hashtag;
        }

        if ($filters->orderId != "") {
            $query .= " ORDER BY ticket_id " . $filters->orderId;
        } else if ($filters->orderAssignee != "") {
            $query .= " ORDER BY assignee " . $filters->orderAssignee;
        } else if ($filters->orderDescription != "") {
            $query .= " ORDER BY ticket_name " . $filters->orderDescription;
        }

        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $tickets = $stmt->fetchAll();

        $client_tickets = array();
        foreach ($tickets as $ticket) {
            $creator = Client::getClient($db, $ticket['creator']);
            $assignee = Client::getClient($db, $ticket['assignee']);

            $departments = array();
            $stmt = $db->prepare('SELECT name_department FROM TicketDepartment WHERE ticket_id = ?');
            $stmt->execute([$ticket['ticket_id']]);
            $departments = $stmt->fetchAll();

            $hashtags = array();
            $stmt = $db->prepare('SELECT name FROM TicketHashtag WHERE ticket_id = ?');
            $stmt->execute([$ticket['ticket_id']]);
            $hashtags = $stmt->fetchAll();

            $ticket = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator, $departments, $hashtags);
            if (Ticket::isAuthorized($db, $ticket->ticket_id, $client->username)) {
                $client_tickets[] = $ticket;
            }
        }
        
        return $client_tickets;
    }
}
?>