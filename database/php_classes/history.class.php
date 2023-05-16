<?php
declare(strict_types=1);
require_once(__DIR__ . '/../../database/php_classes/client.class.php');
class History{
    public int $history_id;
    public Client $user;
    public string $date;
    public string $content;
    
    public function __construct(int $history_id, Client $user, string $date, string $content){
        $this->history_id = $history_id;
        $this->user = $user;
        $this->date = $date;
        $this->content = $content;
    }
    static function getHistory(PDO $db, int $ticket_id) : array{
        $query = $db->prepare('SELECT * FROM TicketHistory WHERE ticket_id = ?');
        $query->execute(array($ticket_id));
        $history = [];
        while($row = $query->fetch()){
            $user = Client::getClient($db, $row['user_id'], null);
            $history[] = new History($row['history_id'], $user, $row['date'], $row['content']);
        }
        return $history;
    }

    static function addStatusHistory(PDO $db, int $ticket_id, int $user_id, string $status){
        $query = $db->prepare('INSERT INTO TicketHistory (ticket_id, user_id, content, date) VALUES (?, ?, ?, ?)');
        $content = "changed the status to ". $status;

        $query->execute(array($ticket_id, $user_id, $content, date('Y-m-d H:i:s')));
    }

    static function addEditHistory(PDO $db, int $ticket_id, int $user_id){
        $query = $db->prepare('INSERT INTO TicketHistory(ticket_id, user_id, content, date) VALUES (?, ?, ?, ?)');
        $content = "edited the ticket";

        $query->execute(array($ticket_id, $user_id, $content, date('Y-m-d H:i:s')));
    }

    function getNiceDate(): string{
        $now = new DateTime();
        $timezone = new DateTimeZone('Europe/London');
        $now->setTimezone($timezone);

        $date = new DateTime($this->date);
        $date->setTimezone($timezone);
        
        $interval = $now->diff($date);

        /*
        my php server is one hour ahead
        var_dump($now);
        var_dump($date);
        var_dump($interval);
        */

        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->d;
        $weeks = floor($days / 7);
        $months = $interval->m;
        $years = $interval->y;

        if($years>0){
            return ' ' . $years . ' years ago';
        }
        elseif($months>0){
            return ' ' . $months . ' months ago';
        }
        elseif($weeks>0){
            return ' ' . $weeks . ' weeks ago';
        }
        elseif($days>0){
            return ' ' . $days . ' days ago';
        }
        elseif($hours>0){
            return ' ' . $hours . ' hours ago';
        }
        elseif($minutes>0){
            return ' ' . $minutes . ' minutes ago';
        }
        else{
            return ' Just now';
        }
    }
}
?>