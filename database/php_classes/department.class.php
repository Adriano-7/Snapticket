<?php
declare(strict_types=1);

class Department{
    public int $department_id;
    public string $name;
    public int $image_id;
    public array $members;

    public function __construct(int $department_id, string $name, int $image_id = 0, array $members = []){
        $this->department_id = $department_id;
        $this->name = $name;
        $this->image_id = $image_id;
        $this->members = $members;

    }
    
    static function getDepartments(PDO $db): array{
        $stmt = $db->prepare('SELECT * FROM department');
        $stmt->execute();
        $departments = [];
        while($row = $stmt->fetch()){
            $departments[] = new Department($row['department_id'], $row['name'], $row['image_id'], Department::getMembers($db, $row['department_id']));            
        }
        return $departments;
    }

    static function getMembers(PDO $db, int $department_id): array{
        $stmt = $db->prepare('SELECT * FROM ClientDepartment WHERE department_id = ?');
        $stmt->bindParam(1, $department_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $members = [];
        while($row = $stmt->fetch()){
            $members[] = Client::getClient($db, $row['user_id'], null);
        }
        return $members;
    }

    function displayIcon(string $class){
      echo '<img src="../actions/display_pic.action.php?id=' . $this->image_id . '" alt="Profile Photo" class="' . $class . '">';
    }

    static function createDepartment(PDO $db, string $title, array $members, $image){
        $image = ['type' => $image['type'], 'content' => file_get_contents($image['tmp_name'])];

        $query = $db->prepare('INSERT INTO File (file_name, file_type, content) VALUES (?, ?, ?)');
        $query->bindParam(1, $title, PDO::PARAM_STR);
        $query->bindParam(2, $image['type'], PDO::PARAM_STR);
        $query->bindParam(3, $image['content'], PDO::PARAM_LOB);
        $query->execute();

        $image_id = $db->lastInsertId();

        $query = $db->prepare('INSERT INTO Department (name, image_id) VALUES (?, ?)');
        $query->bindParam(1, $title, PDO::PARAM_STR);
        $query->bindParam(2, $image_id, PDO::PARAM_INT);
        $query->execute();

        //insert members
        $department_id = $db->lastInsertId();
        foreach($members as $member){
            $query = $db->prepare('INSERT INTO ClientDepartment (user_id, department_id) VALUES (?, ?)');
            $query->bindParam(1, $member, PDO::PARAM_INT);
            $query->bindParam(2, $department_id, PDO::PARAM_INT);
            $query->execute();
        }
    }
}
?>