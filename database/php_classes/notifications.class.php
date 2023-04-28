<?php
declare(strict_types=1);

class Notification{
    public int $notification_id;
    public string $date;
    public string $content;
    public Client $recipient;
    public Client $sender;

    public function __construct(int $notification_id, string $date, string $content, Client $recipient, Client $sender){
        $this->notification_id = $notification_id;
        $this->date = $date;
        $this->content = $content;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    public static function getNotifications(PDO $db, string $username): array{
        $query = $db->prepare('
            SELECT notification_id, date, content, recipient, sender
            FROM Notification
            WHERE lower(recipient) = ?
            ORDER BY notification_id DESC
        ');

        $query->execute(array(strtolower($username)));
        $result = $query->fetchAll();
        $notifications = array();

        foreach($result as $row){
            $recipient = Client::getClient($db, $row['recipient']);
            $sender = Client::getClient($db, $row['sender']);
            $notifications[] = new Notification($row['notification_id'], $row['date'], $row['content'], $recipient, $sender);
        }

        return $notifications;
    }
}
?>