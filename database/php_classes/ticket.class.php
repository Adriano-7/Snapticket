<?php 
    declare(strict_types = 1);
    require_once 'client.class.php';
    class TicketStatus {
        const OPEN = 'open';
        const ASSIGNED = 'assigned';
        const CLOSED = 'closed';
    }    

    class Ticket {
        public int $ticket_id;
        public string $ticket_name;
        public string $date;
        public string $priority;
        public string $assignee;
        public string $status;
        public string $client_name;

        public function __construct(int $ticket_id, string $ticket_name, string $date, string $priority, string $assignee, string $status, string $client_name) {
            $this->ticket_id = $ticket_id;
            $this->ticket_name = $ticket_name;
            $this->date = $date;
            $this->priority = $priority;
            $this->assignee = $assignee;
            $this->status = $status;
            $this->client_name = $client_name;
        }
        static function getClientTickets(PDO $db, string $username) : array{
            $stmt = $db->prepare('SELECT * FROM Ticket WHERE username = ? ORDER BY ticket_id DESC');
            $stmt->execute([$username]);

            $tickets = array();
            while($ticket = $stmt->fetch()){
                $client_name = Client::getClientName($db, $ticket['username']);
                $tickets[] = new Ticket($ticket['ticket_id'], $ticket['ticket_name'], $ticket['date'], $ticket['priority'], $ticket['assignee'] ?? '', $ticket['status'], $client_name);
            }
            return $tickets;
        }
        public function getId() : int {
            return $this->ticket_id;
        }
        public function getTitle() : string {
            return $this->ticket_name;
        }
        public function getDate() : string {
            return $this->date;
        }
        public function getPriority() : string {
            return $this->priority;
        }
        public function getAssignee() : string {
            return $this->assignee;
        }
        public function getStatus() : string {
            return $this->status;
        }
        public function getClientName() : string {
            return $this->client_name;
        }

        public function getDepartment(PDO $db) : string{
            $stmt = $db->prepare('SELECT name_department FROM DepartmentTicket WHERE ticket_id = ?');
            $stmt->execute([$this->ticket_id]);
            $department = $stmt->fetch();
            return $department['name_department'] ?? '';
        }
    }
?>