require_once 'client.class.php';
<?php 
    declare(strict_types = 1);
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
        public ?Client $client;

        public function __construct(int $ticket_id, string $ticket_name, string $date, string $priority, string $assignee, string $status, ?Client $client) {
            $this->ticket_id = $ticket_id;
            $this->ticket_name = $ticket_name;
            $this->date = $date;
            $this->priority = $priority;
            $this->assignee = $assignee;
            $this->status = $status;
            $this->client = $client;
        }
    }
?>