<?php
declare(strict_types=1);
class Priority{
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
}
?>