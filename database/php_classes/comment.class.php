<?php
declare(strict_types = 1);
require_once(__DIR__ . '/client.class.php');
    class Comment {
        public int $comment_id;
        public string $date;
        public string $content;
        public ?Client $sender;

        public function __construct(int $comment_id, string $date, string $content, ?Client $client) {
            $this->comment_id = $comment_id;
            $this->date = $date;
            $this->content = $content;
            $this->sender = $client;
        }

        function getformattedDate() {
            $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $this->date);
            return $dateObj->format('d M Y');
        }
    }
?>