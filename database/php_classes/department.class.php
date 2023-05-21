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
        $query = $db->prepare('SELECT * FROM department');
        $query->execute();
        $departments = [];
        while($row = $query->fetch()){
            $departments[] = new Department($row['department_id'], $row['name'], $row['image_id'], Department::getMembers($db, $row['department_id']));            
        }
        return $departments;
    }

    static function getDepartment(PDO $db, int $department_id){
        $query = $db->prepare('SELECT * FROM Department WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();

        $row = $query->fetch();
        return new Department($row['department_id'], $row['name'], $row['image_id'], Department::getMembers($db, $row['department_id']));
    }

    static function getMembers(PDO $db, int $department_id): array{
        $query = $db->prepare('SELECT * FROM ClientDepartment WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();
        
        $members = [];
        while($row = $query->fetch()){
            $members[] = Client::getClient($db, $row['user_id'], null);
        }
        return $members;
    }

    function displayIcon(string $class){
        echo '<img src="../actions/displayPic.action.php?id=' . $this->image_id . '" alt="' . $this->name . ' icon" class="' . $class . '">';
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

    static function editDepartment(PDO $db, string $title, array $members, $image, int $department_id){
        if($image !== NULL){
            $query = $db->prepare('SELECT image_id FROM Department WHERE department_id = ?');
            $query->bindParam(1, $department_id, PDO::PARAM_INT);
            $query->execute();
            $row = $query->fetch();
            $image_id = $row['image_id'];

            $image = ['type' => $image['type'], 'content' => file_get_contents($image['tmp_name'])];

            $query = $db->prepare('UPDATE File SET file_name = ?, file_type = ?, content = ? WHERE file_id = ?');
            $query->bindParam(1, $title, PDO::PARAM_STR);
            $query->bindParam(2, $image['type'], PDO::PARAM_STR);
            $query->bindParam(3, $image['content'], PDO::PARAM_LOB);
            $query->bindParam(4, $image_id, PDO::PARAM_INT);
            $query->execute();
        }

        $query = $db->prepare('UPDATE Department SET name = ? WHERE department_id = ?');
        $query->bindParam(1, $title, PDO::PARAM_STR);
        $query->bindParam(2, $department_id, PDO::PARAM_INT);
        $query->execute();

        $query = $db->prepare('DELETE FROM ClientDepartment WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();

        foreach($members as $member){
            $query = $db->prepare('INSERT INTO ClientDepartment (user_id, department_id) VALUES (?, ?)');
            $query->bindParam(1, $member, PDO::PARAM_INT);
            $query->bindParam(2, $department_id, PDO::PARAM_INT);
            $query->execute();
        }
    }

    static function exists(PDO $db, int $department_id): bool{
        $query = $db->prepare('SELECT COUNT(*) FROM Department WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch();
        return $row['COUNT(*)'] > 0;
    }

    static function removeDepartment(PDO $db, int $department_id){
        //remove image
        $query = $db->prepare('SELECT image_id FROM Department WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch();
        $image_id = $row['image_id'];

        $query = $db->prepare('DELETE FROM File WHERE file_id = ?');
        $query->bindParam(1, $image_id, PDO::PARAM_INT);
        $query->execute();

        //remove members
        $query = $db->prepare('DELETE FROM ClientDepartment WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();

        //remove department
        $query = $db->prepare('DELETE FROM Department WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();
    }
}
?>