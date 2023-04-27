<?php
declare(strict_types=1);
require_once 'client.class.php';
require_once 'ticket.class.php';
class Comment{
    public int $comment_id;
    public int $num;
    public string $date;
    public string $content;
    public ?Client $client;
    public ?Ticket $ticket;

    public function __construct(int $comment_id, int $num, string $date, string $content, ?Client $client, ?Ticket $ticket){
        $this->comment_id = $comment_id;
        $this->num = $num;
        $this->date = $date;
        $this->content = $content;
        $this->client = $client;
        $this->ticket = $ticket;
    }
}
?>