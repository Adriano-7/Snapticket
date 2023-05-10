<?php
declare(strict_types=1);
class Department{
    public int $department_id;
    public string $name;

    public function __construct(int $department_id, string $name){
        $this->department_id = $department_id;
        $this->name = $name;
    }
    static function getDepartments(PDO $db): array{
        $stmt = $db->prepare('SELECT * FROM department');
        $stmt->execute();
        $departments = [];
        while($row = $stmt->fetch()){
            $departments[] = new Department($row['department_id'], $row['name']);
        }
        return $departments;
    }
}
?>