<?php
declare(strict_types=1);

require_once(__DIR__ . '/client.class.php');

class Notification{
    public int $notification_id;
    public string $date;
    public string $content;
    public bool $isVisited;
    public Client $recipient;
    public Client $sender;
    public int $ticket_id;

    public function __construct(int $notification_id, string $date, string $content, bool $isVisited, Client $recipient, Client $sender, int $ticket_id){
        $this->notification_id = $notification_id;
        $this->date = $date;
        $this->content = $content;
        $this->isVisited = $isVisited;
        $this->recipient = $recipient;
        $this->sender = $sender;
        $this->ticket_id = $ticket_id;
    }

    public static function getNotifications(PDO $db, int $user_id): array{
        $query = $db->prepare('
            SELECT notification_id, date, content, isVisited, recipient, sender, ticket_id
            FROM Notification
            WHERE recipient = ?
            ORDER BY notification_id DESC
        ');

        $query->execute(array($user_id));
        $result = $query->fetchAll();
        $notifications = array();

        foreach($result as $row){
            $recipient = Client::getClient($db, $row['recipient'], null);
            $sender = Client::getClient($db, $row['sender'], null);

            if($recipient === null || $sender === null){
                throw new Exception('Error: recipient or sender is null');
            }

            $notifications[] = new Notification($row['notification_id'], $row['date'], $row['content'], (bool)$row['isVisited'], $recipient, $sender, $row['ticket_id']);
        }

        return $notifications;
    }

    public static function setVisited(PDO $db, int $notification_id): void{
        $query = $db->prepare('
            UPDATE Notification
            SET isVisited = 1
            WHERE notification_id = ?
        ');

        $query->execute(array($notification_id));
    }

    public static function eliminateNotification(PDO $db, int $notification_id): void{
        $query = $db->prepare('
            DELETE FROM Notification
            WHERE notification_id = ?
        ');

        $query->execute(array($notification_id));
    }

    public static function getNotification(PDO $db, int $notification_id) : ?Notification{
        $query = $db->prepare('
            SELECT notification_id, date, content, isVisited, recipient, sender, ticket_id
            FROM Notification
            WHERE notification_id = ?
        ');

        $query->execute(array($notification_id));
        $result = $query->fetch();

        if($result === false){
            return null;
        }

        $recipient = Client::getClient($db, $result['recipient'], null);
        $sender = Client::getClient($db, $result['sender'], null);
        if($recipient === null || $sender === null){
            throw new Exception('Error: recipient or sender is null');
        }

        $notification = new Notification($result['notification_id'], $result['date'], $result['content'], (bool)$result['isVisited'], $recipient, $sender, $result['ticket_id']);
        return $notification;
    }

    public static function isAuthorised(PDO $db, Notification $notification, int $user_id): bool{
        return $notification->recipient->user_id === $user_id;
    }

    public static function getNiceDate(Notification $notification): string{
        $now = new DateTime();
        $date = new DateTime($notification->date);
        $interval = $now->diff($date);

        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->d;
        $weeks = floor($days / 7);
        $months = $interval->m;
        $years = $interval->y;

        if($years>0){
            return $years . ' years ago';
        }
        elseif($months>0){
            return $months . ' months ago';
        }
        elseif($weeks>0){
            return $weeks . ' weeks ago';
        }
        elseif($days>0){
            return $days . ' days ago';
        }
        elseif($hours>0){
            return $hours . ' hours ago';
        }
        elseif($minutes>0){
            return $minutes . ' minutes ago';
        }
        else{
            return 'Just now';
        }
    }
}
?>