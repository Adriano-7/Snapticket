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
    
    static function getQuestions(PDO $db, ?int $department_id) : array{
        if($department_id === null){
            $query = $db->prepare('SELECT * FROM Question WHERE faq_id IS NULL ORDER BY num ASC');
            $query->execute();

            $questions = array();
            foreach($query->fetchAll() as $question){
                $questions[] = new Question($question['quest_id'], $question['num'], $question['title'], $question['content']);
            }
            return $questions;
        }

        $query = $db->prepare('SELECT faq_id FROM FAQ WHERE department_id = ?');
        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();

        $faq_id = null;
        while($row = $query->fetch()){
            $faq_id = $row['faq_id'];
        }

        $query = $db->prepare('SELECT * FROM Question WHERE faq_id = ? ORDER BY num ASC');
        $query->bindParam(1, $faq_id, PDO::PARAM_INT);
        $query->execute();

        $questions = array();
        while($row = $query->fetch()){
            $questions[] = new Question($row['quest_id'], $row['num'], $row['title'], $row['content']);
        }
        
        return $questions;
    }

    static function exists(PDO $db, ?int $department_id) : bool{
        if($department_id === null){
            return true;
        }

        $query = $db->prepare(
            'SELECT faq_id
             FROM FAQ
             WHERE department_id = ?'
        );

        $query->bindParam(1, $department_id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch() !== false;
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
}
?>