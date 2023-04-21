require_once 'database/department.class.php';
require_once 'database/ticket.class.php';
<?php 
    declare(strict_types = 1);
    class DepartmentTicket {
        public ?Department $department;
        public ?Ticket $ticket;

        public function __construct(?Department $department, ?Ticket $ticket) {
            $this->department = $department;
            $this->ticket = $ticket;
        }
    }
?>