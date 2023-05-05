<?php
declare(strict_types=1);
class Client{
  public string $name;
  public string $username;
  public string $email;
  public string $password;
  public bool $isAgent;
  public bool $isAdmin;
  public array $departments;
  public int $image_id;

  public function __construct(string $name, string $username, string $email, string $password, bool $isAgent = false, bool $isAdmin = false, array $departments = [], int $image_id = 1){
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->isAgent = $isAgent;
    $this->isAdmin = $isAdmin;
    $this->departments = $departments;
    $this->image_id = $image_id;
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

  static function changeName(PDO $db, string $username, string $name): bool{
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

  function changeProfilePhoto(PDO $db, $image_id){
    $query = $db->prepare('
          UPDATE Client
          SET image_id = ?
          WHERE lower(username) = ?
          ');

    return $query->execute(array($image_id, strtolower($this->username)));
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
            SELECT name, username, email, password, image_id
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

      return new Client($client['name'], $client['username'], $client['email'], $client['password'], $isAgent, $isAdmin, $departments, $client['image_id']??1);
    }

    return null;
  }

  static function searchClients(PDO $db, MemberFilters $memberFilters) : array{
    $query = "SELECT * FROM Client WHERE lower(username) != ?";
    $params = array(strtolower($_SESSION['username']));

    if($memberFilters->department != ""){
      $query .= " AND lower(username) IN (SELECT lower(username) FROM ClientDepartment WHERE lower(name_department) = ?)";
      $params[] = strtolower($memberFilters->department);
    }

    if($memberFilters->role != ""){
      if($memberFilters->role == "Agent"){
        $query .= " AND lower(username) IN (SELECT lower(username) FROM Agent)";
      }
      else if($memberFilters->role == "Admin"){
        $query .= " AND lower(username) IN (SELECT lower(username) FROM Admin)";
      }
      else{
        $query .= " AND lower(username) NOT IN (SELECT lower(username) FROM Agent) AND lower(username) NOT IN (SELECT lower(username) FROM Admin)";
      }
    }

    if($memberFilters->search != ""){
      $query .= " AND (lower(name) LIKE ? OR lower(username) LIKE ?)";
      $params[] = "%".strtolower($memberFilters->search)."%";
      $params[] = "%".strtolower($memberFilters->search)."%";
    }

    if($memberFilters->orderName != ""){
      $query .= " ORDER BY lower(name) ".$memberFilters->orderName;
    }
    else if($memberFilters->orderUsername != ""){
      $query .= " ORDER BY lower(username) ".$memberFilters->orderUsername;
    }
    else if($memberFilters->orderRole != ""){
      $query .= " ORDER BY lower(username) IN (SELECT lower(username) FROM Agent) ".$memberFilters->orderRole;
    }
    else if($memberFilters->orderDepartment != ""){
      $query .= " ORDER BY lower(username) IN (SELECT lower(username) FROM ClientDepartment) ".$memberFilters->orderDepartment;
    }

    $query .= ";";

    $query = $db->prepare($query);
    $query->execute($params);

    $clients = array();

    while ($client = $query->fetch()) {
      $query1 = $db->prepare('
              SELECT *
              FROM Agent
              WHERE lower(username) = ?
            ');
      $query1->execute(array(strtolower($client['username'])));
      $isAgent = $query1->fetch() !== false;

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

      $clients[] = new Client($client['name'], $client['username'], $client['email'], $client['password'], $isAgent, $isAdmin, $departments, $client['image_id']??1);
    }

    return $clients;
  }

  function displayProfilePhoto(PDO $db, string $class){
    require_once('file.class.php');
    echo '<img src="../actions/display_pic.action.php?id=' . $this->image_id . '" alt="Profile Photo" class="' . $class . '">';  
  }
}
?>