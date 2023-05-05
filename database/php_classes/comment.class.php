<?php
declare(strict_types = 1);
require_once 'client.class.php';
require_once 'ticket.class.php';

    class Comment {
        public int $comment_id;
        public int $num;
        public string $date;
        public string $content;
        public ?Client $client;
        public ?Ticket $ticket;

        public function __construct(int $comment_id, int $num, string $date, string $content, ?Client $client, ?Ticket $ticket) {
            $this->comment_id = $comment_id;
            $this->num = $num;
            $this->date = $date;
            $this->content = $content;
            $this->client = $client;
            $this->ticket = $ticket;
        }
    }

    function getCommentsFromTicket(PDO $db, int $ticket_id) : array {
        
        $stmt = $db->prepare('SELECT * FROM Comment WHERE ticket_id = ? ORDER BY num DESC');
        $stmt->execute([$ticket_id]);
        
        $comments = array();
        while($comment = $stmt->fetch()){
            
            $client = Client::getClientByUsername($db, $comment['username']);
            $ticket = Ticket::getTicketById($db, $comment['ticket_id']);
            $comments[] = new Comment($comment['comment_id'], $comment['num'], $comment['date'], $comment['content'], $client, $ticket);
        }
        return $comments;
    }

    function getClientName() : string {
        return $comment->client->name;
    }

    function getCommentDate() : string {
        return $comment->date;
    }

    function getContent() : string {
        return $comment->content;
    }
?>