require_once 'database/ticket.class.php';
require_once 'database/hashtag.class.php';
<?php 
    declare(strict_types = 1);
    class TicketHashtag {
        public ?Ticket $ticket;
        public ?Hashtag $hashtag;

        public function __construct(?Ticket $ticket, ?Hashtag $hashtag) {
            $this->ticket = $ticket;
            $this->hashtag = $hashtag;
        }
    }
?>