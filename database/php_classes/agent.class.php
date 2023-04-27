<?php
declare(strict_types=1);
require_once 'client.class.php';
class Agent extends Client{
    public function __construct(string $name, string $username, string $email, string $password){
        parent::__construct($name, $username, $email, $password);
    }
}
?>