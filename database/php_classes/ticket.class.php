<?php
declare(strict_types=1);
require_once(__DIR__ . '/comment.class.php');
require_once(__DIR__ .'/../../database/php_classes/client.class.php');
require_once(__DIR__ . '/../../database/php_classes/history.class.php');

class Ticket{
    public int $ticket_id;
    public string $ticket_name;
    public string $date;
    public string $priority;
    public ?Client $assignee;
    public string $status;
    public ?Client $creator;
    public array $departments;
    public array $hashtags;
    public array $comments;
    public array $history;


    public function __construct(int $ticket_id, string $ticket_name, string $date, string $priority, ?Client $assignee, string $status, ?Client $creator, array $departments = [], array $hashtags = [], array $comments = [], array $history = []){
        $this->ticket_id = $ticket_id;
        $this->ticket_name = $ticket_name;
        $this->date = $date;
        $this->priority = $priority;
        $this->assignee = $assignee;
        $this->status = $status;
        $this->creator = $creator;
        $this->departments = $departments;
        $this->hashtags = $hashtags;
        $this->comments = $comments;
        $this->history = $history;
    }

    static public function getTicket(PDO $db, int $ticket_id): ?Ticket{
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE ticket_id = ?');
        $stmt->execute([$ticket_id]);
        $ticket = $stmt->fetch();
        if(!$ticket){
            return null;
        }
        $creator = Client::getClient($db, $ticket['creator'], null);
        $assignee = Client::getClient($db, $ticket['assignee'], null);

        $departments = array();
        $stmt = $db->prepare('SELECT d.name FROM TicketDepartment td JOIN Department d ON td.department_id = d.department_id WHERE ticket_id = ?');
        $stmt->execute([$ticket['ticket_id']]);
        $departments = $stmt->fetchAll();

        $hashtags = array();
        $stmt = $db->prepare('SELECT name FROM TicketHashtag WHERE ticket_id = ?');
        $stmt->execute([$ticket['ticket_id']]);
        $hashtags = $stmt->fetchAll();

        return new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator, $departments, $hashtags, Ticket::getComments($db, $ticket['ticket_id']), History::getHistory($db, $ticket['ticket_id']));
    }
    
    static public function isAuthorized(PDO $db, int $ticket_id, int $creator): bool{
        //The user is admin
        $stmt = $db->prepare('SELECT * FROM Admin WHERE user_id = ?');
        $stmt->execute([$creator]);
        if ($stmt->fetch()) {
            return true;
        }

        //The ticket belongs to the department of the agent
        $stmt = $db->prepare('SELECT * FROM CLientDepartment WHERE user_id = ? AND department_id = (SELECT department_id FROM TicketDepartment WHERE ticket_id = ?)');
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
        $query = "SELECT Ticket.*, Client.username AS assignee_username
                  FROM Ticket
                  LEFT JOIN Agent ON Ticket.assignee = Agent.user_id
                  LEFT JOIN Client ON Agent.user_id = Client.user_id";

        $params = array();

        if ($filters->search != "") {
            $query .= " WHERE ticket_name LIKE ?";
            $params[] = "%" . $filters->search . "%";
        }

        if ($filters->department != "") {
            if ($filters->search == "") {
                $query .= " WHERE ticket_id IN (SELECT ticket_id FROM TicketDepartment WHERE department_id = (SELECT department_id FROM Department where name = ?))";
            } 
            else {
                $query .= " AND ticket_id IN (SELECT ticket_id FROM TicketDepartment WHERE department_id = (SELECT department_id FROM Department where name = ?))";
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
                $query .= " WHERE assignee_username = ?";
            } else {
                $query .= " AND assignee_username = ?";
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

        if($filters->orderId != ""){
            $query .= " ORDER BY ticket_id " . $filters->orderId;
        }
        
        if($filters->orderAssignee != ""){
            if($filters->orderId == ""){
                $query .= " ORDER BY assignee_username " . $filters->orderAssignee;
            }
            else{
                $query .= ", assignee_username " . $filters->orderAssignee;
            }
        }

        if($filters->orderDescription != ""){
            if($filters->orderId == "" && $filters->orderAssignee == ""){
                $query .= " ORDER BY ticket_name " . $filters->orderDescription;
            }
            else{
                $query .= ", ticket_name " . $filters->orderDescription;
            }
        }

        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $tickets = $stmt->fetchAll();

        $client_tickets = array();

        foreach ($tickets as $ticket) {
            $creator = Client::getClient($db, $ticket['creator'], null);
            $assignee = Client::getClient($db, $ticket['assignee'], null);

            $departments = array();
            $stmt = $db->prepare('SELECT d.name FROM TicketDepartment td JOIN Department d ON td.department_id = d.department_id WHERE ticket_id = ?');
            $stmt->execute([$ticket['ticket_id']]);
            $departments = $stmt->fetchAll();

            $hashtags = array();
            $stmt = $db->prepare('SELECT name FROM TicketHashtag WHERE ticket_id = ?');
            $stmt->execute([$ticket['ticket_id']]);
            $hashtags = $stmt->fetchAll();

            $ticket = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $assignee, $ticket['status'], $creator, $departments, $hashtags, Ticket::getComments($db, $ticket['ticket_id']), History::getHistory($db, $ticket['ticket_id']));
            if (Ticket::isAuthorized($db, $ticket->ticket_id, $client->user_id)) {
                $client_tickets[] = $ticket;
            }
        }
        
        return $client_tickets;
    }

    function getformattedDate() {
        $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $this->date);
        return $dateObj->format('d M Y');
    }

    static function getAssignees(array $tickets){
        $assignees = array();
        foreach ($tickets as $ticket) {
            if($ticket->assignee !== NULL && !in_array($ticket->assignee->username, $assignees)){
                $assignees[] = $ticket->assignee->username;
            }
        }
        return $assignees;
    }
    
    static function getStatuses(array $tickets){
        $statuses = array();
        foreach ($tickets as $ticket) {
            if (!in_array($ticket->status, $statuses)) {
                $statuses[] = $ticket->status;
            }
        }
        return $statuses;
    }

    static function getDepartments(array $tickets){
        $departments = array();
        foreach ($tickets as $ticket) {
            foreach ($ticket->departments as $department) {
                if (!in_array($department['name'], $departments)) {
                    $departments[] = $department['name'];
                }
            }
        }
        return $departments;
    }

    static function getHashtags(array $tickets){
        $hashtags = array();
        foreach ($tickets as $ticket) {
            foreach ($ticket->hashtags as $hashtag) {
                if (!in_array($hashtag['name'], $hashtags)) {
                    $hashtags[] = $hashtag['name'];
                }
            }
        }
        return $hashtags;
    }

    static function getComments(PDO $db, int $ticket_id): array{
        $query = $db->prepare('SELECT * FROM Comment WHERE ticket_id = ? ORDER BY comment_id ASC');
        $query->execute([$ticket_id]);
        $comments = $query->fetchAll();

        $ticket_comments = array();

        foreach ($comments as $comment) {
            $client = Client::getClient($db, $comment['user_id'], null);
            $ticket_comments[] = new Comment($comment['comment_id'], $comment['date'], $comment['content'], $client);
        }

        return $ticket_comments;
    }

    function changeStatus(PDO $db, string $status){
        $query = $db->prepare('UPDATE Ticket SET status = ? WHERE ticket_id = ?');
        $query->execute([$status, $this->ticket_id]);
    }

    static function createTicket(PDO $db, string $title, int $user_id, array $departments, string $priority, int $assignee, array $hashtags) : int{
        $query = $db->prepare('INSERT INTO Ticket (ticket_name, priority, assignee, status, creator) VALUES (?, ?, ?, ?, ?)');

        if($priority == ''){
            $priority = NULL;
        }
        if($assignee == ''){
            $assignee = NULL;
        }
        if($hashtags == ''){
            $hashtags = NULL;
        }

        $query->bindParam(1, $title);
        $query->bindParam(2, $priority);
        $query->bindParam(3, $assignee);
        $query->bindValue(4, "Open");
        $query->bindParam(5, $user_id);

        $query->execute();
        
        $ticket_id = $db->lastInsertId();

        foreach ($departments as $department) {
            $query = $db->prepare('INSERT INTO TicketDepartment (department_id, ticket_id) VALUES (?, ?)');
            $query->bindParam(1, $department);
            $query->bindParam(2, $ticket_id);
            $query->execute();
        }

        foreach ($hashtags as $hashtag) {
            $query = $db->prepare('INSERT INTO TicketHashtag (ticket_id, name) VALUES (?, ?)');
            $query->bindParam(1, $ticket_id);
            $query->bindParam(2, $hashtag);
            $query->execute();
        }

        return intval($ticket_id);
    }

    function alterTicket(PDO $db, string $title, array $departments, string $priority, int $assignee, array $hashtags){
        $query = $db->prepare('UPDATE Ticket SET ticket_name = ?, priority = ?, assignee = ? WHERE ticket_id = ?');
        $query->bindParam(1, $title, PDO::PARAM_STR);
        $query->bindParam(2, $priority, PDO::PARAM_STR);
        $query->bindParam(3, $assignee, PDO::PARAM_INT);
        $query->bindParam(4, $this->ticket_id, PDO::PARAM_INT);

        $query->execute();

        $query = $db->prepare('DELETE FROM TicketDepartment WHERE ticket_id = ?');
        $query->bindParam(1, $this->ticket_id, PDO::PARAM_INT);
        $query->execute();

        foreach ($departments as $department) {
            $query = $db->prepare('INSERT INTO TicketDepartment (department_id, ticket_id) VALUES (?, ?)');
            $query->bindParam(1, $department, PDO::PARAM_INT);
            $query->bindParam(2, $this->ticket_id, PDO::PARAM_INT);
            $query->execute();
        }

        $query = $db->prepare('DELETE FROM TicketHashtag WHERE ticket_id = ?');
        $query->bindParam(1, $this->ticket_id, PDO::PARAM_INT);
        $query->execute();

        foreach ($hashtags as $hashtag) {
            $query = $db->prepare('INSERT INTO TicketHashtag (ticket_id, name) VALUES (?, ?)');
            $query->bindParam(1, $this->ticket_id, PDO::PARAM_INT);
            $query->bindParam(2, $hashtag, PDO::PARAM_STR);
            $query->execute();
        }
    }
}
?>