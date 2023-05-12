<?php
    declare(strict_types = 1);
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

        static function writeComment(PDO $db, int $ticket_id, int $user_id, string $comment){
            $stmt = $db->prepare('INSERT INTO Comment (content, user_id, ticket_id) VALUES (?, ?, ?)');
            $stmt->execute(array($comment, $user_id, $ticket_id));
        }
    }
?>