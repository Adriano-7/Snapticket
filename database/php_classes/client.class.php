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
        
        static function getClientWithPassword(PDO $db, string $username, string $password) : ?Client{
            $query = $db->prepare('
            SELECT name, username, email, password
            FROM Client
            WHERE lower(username) = ? AND password = ?
          ');
    
          $query->execute(array(strtolower($username), sha1($password)));

          if($client = $query->fetch()){
            return new Client($client['name'], $client['username'], $client['email'], $client['password']);
          }
          return null;
        }

        static function getClientName(PDO $db, string $username) : string{
            $query = $db->prepare('
            SELECT name
            FROM Client
            WHERE lower(username) = ?
          ');
    
          $query->execute(array(strtolower($username)));

          if($client = $query->fetch()){
            return $client['name'];
          }
          return '';
        }
    }


?>