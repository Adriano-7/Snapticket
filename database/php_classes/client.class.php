<?php
declare(strict_types=1);
class Client{
  public string $name;
  public string $username;
  public string $email;
  public string $password;

  public function __construct(string $name, string $username, string $email, string $password){
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }

  static function register(PDO $db, string $name, string $username, string $email, string $password): bool{
    $query = $db->prepare('
            INSERT INTO Client(name, username, email, password)
            VALUES (?, ?, ?, ?)
          ');

    return $query->execute(array($name, $username, $email, sha1($password)));
  }

  static function clientExists(PDO $db, string $username): bool{
    $query = $db->prepare('
            SELECT username
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    return $query->fetch() !== false;
  }

  static function changeName(PDO $db, string $username, string $name): bool{
    $query = $db->prepare('
            UPDATE Client
            SET name = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($name, strtolower($username)));
  }

  static function changeUsername(PDO $db, string $username, string $newUsername): bool{
    $query = $db->prepare('
            UPDATE Client
            SET username = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($newUsername, strtolower($username)));
  }

  static function changeEmail(PDO $db, string $username, string $email): bool{
    $query = $db->prepare('
            UPDATE Client
            SET email = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($email, strtolower($username)));
  }

  static function changePassword(PDO $db, string $username, string $password): bool{
    $query = $db->prepare('
            UPDATE Client
            SET password = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array(sha1($password), strtolower($username)));
  }

  static function changeProfilePhoto(PDO $db, string $username, $image_blob){
    $query = $db->prepare('
          UPDATE Client
          SET user_image = ?
          WHERE lower(username) = ?
          ');

    return $query->execute(array($image_blob, strtolower($username)));
  }

  static function getClientWithPassword(PDO $db, string $username, string $password): ?Client{
    $query = $db->prepare('
            SELECT name, username, email, password
            FROM Client
            WHERE lower(username) = ? AND password = ?
          ');

    $query->execute(array(strtolower($username), sha1($password)));

    if ($client = $query->fetch()) {
      return new Client($client['name'], $client['username'], $client['email'], $client['password']);
    }
    return null;
  }

  static function getClientName(PDO $db, string $username): string{
    $query = $db->prepare('
            SELECT name
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    if ($client = $query->fetch()) {
      return $client['name'];
    }
    return '';
  }

  static function getClientInfo(PDO $db, string $username): array{
    $query = $db->prepare('
            SELECT name, username, email
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    if ($client = $query->fetch()) {
      return array('name' => $client['name'], 'username' => $client['username'], 'email' => $client['email']);
    }
    return array();
  }

  static function getClient(PDO $db, string $username): ?Client{
    $query = $db->prepare('
            SELECT name, username, email, password
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    if ($client = $query->fetch()) {
      return new Client($client['name'], $client['username'], $client['email'], $client['password']);
    }
    return null;
  }
}
?>