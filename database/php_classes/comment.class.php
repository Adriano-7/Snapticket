<?php
declare(strict_types = 1);
require_once 'client.class.php';
require_once 'ticket.class.php';

    class Comment {
        public int $comment_id;
        public string $num;
        public string $date;
        public string $content;
        public ?Client $client;
        public ?Ticket $ticket;

        public function __construct(int $comment_id, string $num, string $date, string $content, ?Client $client, ?Ticket $ticket) {
            $this->comment_id = $comment_id;
            $this->num = $num;
            $this->date = $date;
            $this->content = $content;
            $this->client = $client;
            $this->ticket = $ticket;
        }
    }

    /*
    DROP TABLE IF EXISTS Ticket;
CREATE TABLE Ticket (
    ticket_id INTEGER PRIMARY KEY, 
    ticket_name TEXT,
    date TEXT,
    priority TEXT, 
    assignee TEXT REFERENCES Agent(username) ON DELETE SET NULL ON UPDATE CASCADE, 
    status TEXT, 
    creator REFERENCES Client(username) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    comment_id INTEGER PRIMARY KEY,
    num INTEGER, 
    date TEXT, 
    content TEXT, 
    username REFERENCES Client(username) ON DELETE SET NULL ON UPDATE CASCADE NOT NULL, 
    ticket_id INTEGER REFERENCES Ticket(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL
);

    */
    function getCommentsFromTicket(PDO $db, string $ticket_id) : array {
        
        $query = 'SELECT * FROM Comment WHERE ticket_id = ?';
        $stmt = $db->prepare($query);

        $stmt->execute([$ticket_id]);
        $comments = $stmt->fetchAll();

        $client_comments = array();

        foreach($comments as $comment) {
            $client = Client::getClient($db, $comment['username']);

            $ticket = Ticket::getTicket($db, strval($comment['ticket_id']));
            $num = strval($comment['num']);
            $client_comments[] = new Comment($comment['comment_id'], $num, $comment['date'], $comment['content'], $client, $ticket);
        }

        return $client_comments;
    }
?>