<?php
declare(strict_types=1);
class Hashtag{
    public string $name;
    
    public function __construct(string $name){
        $this->name = $name;
    }

    static function getAllHashtags(PDO $db){
        $query = $db->prepare('SELECT * FROM Hashtag');
        $query->execute();
        $hashtags = [];
        while($row = $query->fetch()){
            $hashtags[] = new Hashtag($row['name']);
        }
        return $hashtags;
    }

    static function hashtagExists(PDO $db, string $hashtag){
        $query = $db->prepare('SELECT * FROM Hashtag WHERE name = ?');
        $query->execute([$hashtag]);
        return $query->fetch() !== false;
    }

    static function editHashtags(PDO $db, array $hashtags){
        $query = $db->prepare('DELETE FROM Hashtag');
        $query->execute();
        foreach($hashtags as $hashtag){
            $query = $db->prepare('INSERT INTO Hashtag (name) VALUES (?)');
            $query->execute([$hashtag]);
        }
    }

    static function removeHashtag(PDO $db, string $hashtag){
        $query = $db->prepare('DELETE FROM Hashtag WHERE name = ?');
        $query->execute([$hashtag]);
    }
}
?>