<?php
declare(strict_types=1);
require_once 'database/faq.class.php';
class Question{
    public int $quest_id;
    public int $num;
    public string $title;
    public string $content;

    public function __construct(int $quest_id, int $num, string $title, string $content){
        $this->quest_id = $quest_id;
        $this->num = $num;
        $this->title = $title;
        $this->content = $content;
    }
}
?>