<?php
declare(strict_types=1);
class Client
{
  public string $name;
  public string $username;
  public string $email;
  public string $password;
  public bool $isAgent;
  public bool $isAdmin;
  public array $departments;
  public string $image_blob;

  public function __construct(string $name, string $username, string $email, string $password, bool $isAgent = false, bool $isAdmin = false, array $departments = [], string $image_blob = null)
  {
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->isAgent = $isAgent;
    $this->isAdmin = $isAdmin;
    $this->departments = $departments;
    $this->image_blob = $image_blob;
  }

  static function register(PDO $db, string $name, string $username, string $email, string $password): bool
  {
    $query = $db->prepare('
            INSERT INTO Client(name, username, email, password)
            VALUES (?, ?, ?, ?)
          ');

    return $query->execute(array($name, $username, $email, sha1($password)));
  }

  static function usernameExists(PDO $db, string $username): bool
  {
    $query = $db->prepare('
            SELECT username
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    return $query->fetch() !== false;
  }

  static function changeName(PDO $db, string $username, string $name): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET name = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($name, strtolower($username)));
  }

  static function changeUsername(PDO $db, string $username, string $newUsername): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET username = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($newUsername, strtolower($username)));
  }

  static function changeEmail(PDO $db, string $username, string $email): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET email = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array($email, strtolower($username)));
  }

  static function changePassword(PDO $db, string $username, string $password): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET password = ?
            WHERE lower(username) = ?
          ');

    return $query->execute(array(sha1($password), strtolower($username)));
  }

  static function changeProfilePhoto(PDO $db, string $username, $image_blob)
  {
    $query = $db->prepare('
          UPDATE Client
          SET user_image = ?
          WHERE lower(username) = ?
          ');

    return $query->execute(array($image_blob, strtolower($username)));
  }

  static function getClientWithPassword(PDO $db, string $username, string $password): ?Client
  {
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

  static function getClient(PDO $db, ?string $username): ?Client
  {
    if ($username === null) {
      return null;
    }

    $query = $db->prepare('
            SELECT name, username, email, password, user_image
            FROM Client
            WHERE lower(username) = ?
          ');
    $query->execute(array(strtolower($username)));

    if ($client = $query->fetch()) {
      $isAgent = false;
      $isAdmin = false;

      $query = $db->prepare('
            SELECT *
            FROM Agent
            WHERE lower(username) = ?
          ');
      $query->execute(array(strtolower($username)));
      $isAgent = $query->fetch() !== false;

      $query = $db->prepare('
            SELECT *
            FROM Admin
            WHERE lower(username) = ?
          ');
      $query->execute(array(strtolower($username)));
      $isAdmin = $query->fetch() !== false;

      $query = $db->prepare('
            SELECT name_department
            FROM ClientDepartment
            WHERE lower(username) = ?
          ');
      $query->execute(array(strtolower($username)));
      $departments = array();
      while ($department = $query->fetch()) {
        array_push($departments, $department['name_department']);
      }


      return new Client($client['name'], $client['username'], $client['email'], $client['password'], $isAgent, $isAdmin, $departments, $client['user_image']);
    }

    return null;
  }

  function getAllClients(PDO $db): array{
    $query = $db->prepare('
            SELECT *
            FROM Client
            WHERE lower(username) != ?
          ');

    $query->execute(array(strtolower($this->username)));

    $clients = array();

    while ($client = $query->fetch()) {
      $query1 = $db->prepare('
              SELECT *
              FROM Agent
              WHERE lower(username) = ?
            ');
      $query1->execute(array(strtolower($client['username'])));
      $isAgent = $query->fetch() !== false;

      $query1 = $db->prepare('
              SELECT *
              FROM Admin
              WHERE lower(username) = ?
            ');
      $query1->execute(array(strtolower($client['username'])));
      $isAdmin = $query1->fetch() !== false;

      $query1 = $db->prepare('
              SELECT name_department
              FROM ClientDepartment
              WHERE lower(username) = ?
            ');
      $query1->execute(array(strtolower($client['username'])));
      $departments = array();
      while ($department = $query1->fetch()) {
        array_push($departments, $department['name_department']);
      }

      $clients[] = new Client($client['name'], $client['username'], $client['email'], $client['password'], $isAgent, $isAdmin, $departments, $client['user_image']);
    }

    return $clients;
  }

  function displayProfilePhoto(string $class){
    if($this->image_blob != null){
      echo '<img src="data:image/jpeg;base64,'.base64_encode($this->image_blob).'" alt="Profile Photo" class="'.$class.'">';
    }
    else{
      echo '<img src="images/profile.png" alt="Profile Photo" class="'.$class.'">';
    }
  }
}
?>