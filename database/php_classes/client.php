<?php 
    declare(strict_types = 1);
    class Client {
        public string $name;
        public string $username;
        public string $email;
        public string $password;

        public function __construct(string $name, string $username, string $email, string $password) {
            $this->name = $name;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
        
        static function getClientName(string $username): string {
            $db = connectToDatabase();
            $statement = $db->prepare('
                SELECT name 
                FROM Client
                WHERE username = ?
            ');
            $statement->execute([$username]);
            $client = $statement->fetch(PDO::FETCH_ASSOC);
            return $client['name'];
        }
    }


?>