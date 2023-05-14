<?php
declare(strict_types=1);
require_once(__DIR__ . '/department.class.php');
require_once(__DIR__ . '/question.class.php');

class FAQ{
    public int $faq_id;
    public ?Department $department;
    public array $questions;

    public function __construct(int $faq_id, ?Department $department, array $questions){
        $this->faq_id = $faq_id;
        $this->department = $department;
        $this->questions = $questions;
    }
    
    static function getQuestions(PDO $db, int $faq_id) : array{
        $query = $db->prepare('SELECT * FROM Question WHERE faq_id = ? ORDER BY num ASC');
        $query->bindParam(1, $faq_id, PDO::PARAM_INT);
        $query->execute();

        $questions = array();
        while($row = $query->fetch()){
            $questions[] = new Question($row['quest_id'], $row['num'], $row['title'], $row['content']);
        }
        
        return $questions;
    }

    static function exists(PDO $db, int $faq_id) : bool{
        $query = $db->prepare('SELECT COUNT(*) FROM FAQ WHERE faq_id = ?');
        $query->bindParam(1, $faq_id, PDO::PARAM_INT);
        $query->execute();

        $count = $query->fetch()['COUNT(*)'];

        return $count == 1;
    }

    static function getDepartments(PDO $db){
        $query = $db->prepare('Select d.department_id, d.name, d.image_id FROM Department d JOIN FAQ f ON d.department_id = f.department_id');
        $query->execute();

        $departments = array();
        while($row = $query->fetch()){
            $departments[] = new Department($row['department_id'], $row['name'], $row['image_id'], Department::getMembers($db, $row['department_id']));
        }
        return $departments;
    }

    static function editFaq(PDO $db, int $faq_id, array $questions, array $answers){
        $query = $db->prepare('DELETE FROM Question WHERE faq_id = ?');
        $query->bindParam(1, $faq_id, PDO::PARAM_INT);
        $query->execute();

        for($i = 0; $i < count($questions); $i++){
            $query = $db->prepare('INSERT INTO Question (num, title, content, faq_id) VALUES (?, ?, ?, ?)');
            $num = $i+1;
            $query->bindParam(1, $num, PDO::PARAM_INT);
            $query->bindParam(2, $questions[$i], PDO::PARAM_STR);
            $query->bindParam(3, $answers[$i], PDO::PARAM_STR);
            $query->bindParam(4, $faq_id, PDO::PARAM_INT);
            $query->execute();
        }
    }
}
?>