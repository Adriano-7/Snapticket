require_once 'client.class.php';
<?php 
    declare(strict_types = 1);
    class Agent extends Client {
        public function __construct($db, string $name, string $username, string $email, string $password) {
            parent::__construct($name, $username, $email, $password);
        }
    }
?>