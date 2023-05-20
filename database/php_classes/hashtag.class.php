<?php
declare(strict_types=1);
class Hashtag{
    public string $name;
    
    public function __construct(string $name){
        $this->name = $name;
    }

    static function getAllHashtags(PDO $db){
        $stmt = $db->prepare('SELECT * FROM Hashtag');
        $stmt->execute();
        $hashtags = [];
        while($row = $stmt->fetch()){
            $hashtags[] = new Hashtag($row['name']);
        }
        return $hashtags;
    }

    static function hashtagExists(PDO $db, string $hashtag){
        $stmt = $db->prepare('SELECT * FROM Hashtag WHERE name = ?');
        $stmt->execute([$hashtag]);
        return $stmt->fetch() !== false;
    }

    static function editHashtags(PDO $db, array $hashtags){
        $query = $db->prepare('DELETE FROM Hashtag');
        $query->execute();
        foreach($hashtags as $hashtag){
            $query = $db->prepare('INSERT INTO Hashtag (name) VALUES (?)');
            $query->execute([$hashtag]);
        }
    }
}
?>