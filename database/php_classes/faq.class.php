<?php
declare(strict_types=1);
require_once 'database\department.class.php';
class FAQ{
    public int $faq_id;
    public ?Department $department;
    public function __construct(int $faq_id, ?Department $department){
        $this->faq_id = $faq_id;
        $this->department = $department;
    }
}
?>