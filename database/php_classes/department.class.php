<?php
declare(strict_types=1);
class Department{
    public string $name;

    public function __construct(string $name){
        $this->name = $name;
    }
    static function getDepartments(PDO $db): array{
        $stmt = $db->prepare('SELECT * FROM department');
        $stmt->execute();
        $departments = [];
        while($row = $stmt->fetch()){
            $departments[] = new Department($row['name']);
        }
        return $departments;
    }
}
?>