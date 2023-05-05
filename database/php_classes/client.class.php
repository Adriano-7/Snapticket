<?php
declare(strict_types=1);
class Client{
  public string $name;
  public string $username;
  public string $email;
  public bool $isAgent;
  public bool $isAdmin;
  public array $departments;
  public int $image_id;

  public function __construct(string $name, string $username, string $email, bool $isAgent = false, bool $isAdmin = false, array $departments = [], int $image_id = 1){
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
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

  function changeProfilePhoto(PDO $db, $image_blob){
    $query = $db->prepare('
          UPDATE File
          SET content = ?
          WHERE file_id = ?
        ');

    $query->execute(array($image_blob, $this->image_id));
  }

  static function getClientWithPassword(PDO $db, string $username, string $password): ?Client
  {
    $query = $db->prepare('
            SELECT *
            FROM Client
            WHERE lower(username) = ? AND password = ?
          ');

    $query->execute(array(strtolower($username), sha1($password)));

    if ($client = $query->fetch()) {
      return new Client($client['name'], $client['username'], $client['email']);
    }
    return null;
  }

  static function getClient(PDO $db, ?string $username): ?Client{
    if ($username === null) {
      return null;
    }

    $query = $db->prepare('
            SELECT *
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

      return new Client($client['name'], $client['username'], $client['email'], $isAgent, $isAdmin, $departments, $client['image_id']??1);
    }

    return null;
  }

  static function searchClients(PDO $db, MemberFilters $memberFilters) : array{
    $subquery = "SELECT c.name, c.username, c.email, c.password, c.image_id, cd.name_department, 
                 CASE WHEN a.username IS NOT NULL THEN 'Agent' WHEN ad.username IS NOT NULL THEN 'Admin' ELSE 'Client' END AS role
                 FROM Client c
                 LEFT JOIN ClientDepartment cd ON c.username = cd.username
                 LEFT JOIN Agent a ON c.username = a.username
                 LEFT JOIN Admin ad ON a.username = ad.username
                 WHERE lower(c.username) != ?";

    $params = array(strtolower($_SESSION['username']));

    if($memberFilters->department != ""){
      $subquery .= " AND lower(cd.name_department) = ?";
      $params[] = strtolower($memberFilters->department);
    }

    if($memberFilters->role != ""){
      if($memberFilters->role == "Agent"){
        $subquery .= " AND lower(a.username) IS NOT NULL";
      }
      else if($memberFilters->role == "Admin"){
        $subquery .= " AND lower(ad.username) IS NOT NULL";
      }
      else{
        $subquery .= " AND lower(a.username) IS NULL AND lower(ad.username) IS NULL";
      }
    }

    if($memberFilters->search != ""){
      $subquery .= " AND (lower(c.name) LIKE ? OR lower(c.username) LIKE ?)";
      $params[] = "%".strtolower($memberFilters->search)."%";
      $params[] = "%".strtolower($memberFilters->search)."%";
    }

    if($memberFilters->orderName != ""){
      $subquery .= " ORDER BY lower(c.name) ".$memberFilters->orderName;
    }

    if($memberFilters->orderUsername != ""){
      if($memberFilters->orderName == ""){
        $subquery .= " ORDER BY lower(c.username) ".$memberFilters->orderUsername;
      }
      else{
        $subquery .= ", lower(c.username) ".$memberFilters->orderUsername;
      }
    }

    if($memberFilters->orderRole != ""){
      if($memberFilters->orderName == "" && $memberFilters->orderUsername == ""){
        $subquery .= " ORDER BY lower(role) ".$memberFilters->orderRole;
      }
      else{
        $subquery .= ", lower(role) ".$memberFilters->orderRole;
      }
    }

    if($memberFilters->orderDepartment != ""){
      if($memberFilters->orderName == "" && $memberFilters->orderUsername == "" && $memberFilters->orderRole == ""){
        $subquery .= " ORDER BY lower(cd.name_department) ".$memberFilters->orderDepartment;
      }
      else{
        $subquery .= ", lower(cd.name_department) ".$memberFilters->orderDepartment;
      }
    }

    $query = "SELECT * FROM ($subquery) subquery;";
    $query = $db->prepare($query);
    $query->execute($params);
    $clients = array();

    while ($client = $query->fetch()) {
      $clients[] = new Client($client['name'], $client['username'], $client['email'], $client['role'] == 'Agent', $client['role'] == 'Admin', array($client['name_department']), $client['image_id']??1);
    }

    return $clients;
  }


  function displayProfilePhoto(PDO $db, string $class){
    require_once('file.class.php');
    echo '<img src="../actions/display_pic.action.php?id=' . $this->image_id . '" alt="Profile Photo" class="' . $class . '">';  
  }
}
?>