<?php
declare(strict_types=1);
require_once '../database/php_classes/department.class.php';
class FAQ{
    public int $faq_id;
    public ?Department $department;
    public array $questions;
    
    public function __construct(int $faq_id, ?Department $department){
        $this->faq_id = $faq_id;
        $this->department = $department;
    }

    static function getQuestions(PDO $db, string $department) : array{
        $query = $db->prepare('
            SELECT faq_id
            FROM FAQ
            WHERE name_department = ?
        ');


        $query->execute(array($department));
        $faq_id = $query->fetch()['faq_id'];

        $query = $db->prepare('
            SELECT quest_id, num, title, content
            FROM Question
            WHERE faq_id = ?
        ');

        $query->execute(array($faq_id));
        $questions = $query->fetchAll();

        $result = array();
        foreach($questions as $question){
            $result[] = new Question($question['quest_id'], $question['num'], $question['title'], $question['content']);
        }

        return $result;
    }
}
?>