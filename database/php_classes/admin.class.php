<?php
declare(strict_types=1);
require_once 'agent.class.php';
class Admin extends Agent{
    public function __construct(string $name, string $username, string $email, string $password){
        parent::__construct($name, $username, $email, $password);
    }
}
?>