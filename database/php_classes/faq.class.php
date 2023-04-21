require_once 'database\department.class.php';
<?php 
    declare(strict_types = 1);
    class FAQ {
        public int $faq_id;
        public ?Department $department;

        public function __construct(int $faq_id, ?Department $department) {
            $this->faq_id = $faq_id;
            $this->department = $department;
        }
    }
?>