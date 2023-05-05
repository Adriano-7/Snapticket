<?php
declare(strict_types=1);
require_once 'database/faq.class.php';
class Question{
    public int $quest_id;
    public int $num;
    public string $title;
    public string $content;
    public ?FAQ $faq;
}
?>