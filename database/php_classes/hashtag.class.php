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

    static function hashtagExists(PDO $db, string $tag){
        $stmt = $db->prepare('SELECT * FROM Hashtag WHERE name = ?');
        $stmt->execute([$tag]);
        return $stmt->fetch() !== false;
    }

    static function createHashtag(PDO $db, string $tag){
        $stmt = $db->prepare('INSERT INTO Hashtag (name) VALUES (?)');
        $stmt->execute([$tag]);
    }
}
?>