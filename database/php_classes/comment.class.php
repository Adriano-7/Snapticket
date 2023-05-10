<?php
declare(strict_types = 1);
require_once 'client.class.php';
require_once 'ticket.class.php';

    class Comment {
        public int $comment_id;
        public string $date;
        public string $content;
        public ?Client $client;

        public function __construct(int $comment_id, string $date, string $content, ?Client $client) {
            $this->comment_id = $comment_id;
            $this->date = $date;
            $this->content = $content;
            $this->client = $client;
        }
    }
?>