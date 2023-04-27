<?php
declare(strict_types=1);
class Department{
    public string $name;
    public function __construct($name){
        $this->name = $name;
    }
}
?>