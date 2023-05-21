<?php
declare(strict_types=1);
class Client {
  public int $user_id;
  public string $name;
  public string $username;
  public string $email;
  public bool $isAgent;
  public bool $isAdmin;
  public array $departments;
  public int $image_id;

  public function __construct(int $user_id, string $name, string $username, string $email, bool $isAgent = false, bool $isAdmin = false, array $departments = [], int $image_id=0){
    $this->user_id = $user_id;
    $this->name = $name;
    $this->username = $username;
    $this->email = $email;
    $this->isAgent = $isAgent;
    $this->isAdmin = $isAdmin;
    $this->departments = $departments;
    $this->image_id = $image_id;
  }

  static function register(PDO $db, string $name, string $username, string $email, string $password): bool{
    $query = $db->prepare('
            INSERT INTO Client(name, username, email, password)
            VALUES (?, ?, ?, ?)
          ');

    return $query->execute(array($name, $username, $email, password_hash($password, PASSWORD_BCRYPT)));
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

  function changeName(PDO $db, string $name): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET name = ?
            WHERE user_id = ?
          ');

    return $query->execute(array($name, $this->user_id));
  }

  function changeUsername(PDO $db, string $newUsername): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET username = ?
            WHERE user_id = ?
          ');

    return $query->execute(array($newUsername, $this->user_id));
  }

  function changeEmail(PDO $db, string $email): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET email = ?
            WHERE user_id = ?
          ');

    return $query->execute(array($email, $this->user_id));
  }

  function changePassword(PDO $db, string $password): bool
  {
    $query = $db->prepare('
            UPDATE Client
            SET password = ?
            WHERE user_id = ?
          ');

    return $query->execute(array(sha1($password), $this->user_id));
  }

  function changeProfilePhoto(PDO $db, $image_blob)
  {
    $query = $db->prepare('
          UPDATE File
          SET content = ?
          WHERE file_id = ?
        ');

    $query->execute(array($image_blob, $this->image_id));
  }

  static function eliminateClient(PDO $db, int $user_id): bool
  {
    $query = $db->prepare('
            DELETE FROM Client
            WHERE user_id = ?
          ');

    return $query->execute(array($user_id));
  }

  static function getClientWithPassword(PDO $db, string $username, string $password): ?Client
  {
    $query = $db->prepare('
            SELECT *
            FROM Client
            WHERE lower(username) = ?
          ');

    $query->execute(array(strtolower($username)));

    if ($client = $query->fetch()) {
      if (password_verify($password, $client['password'])) {
        return new Client($client['user_id'], $client['name'], $client['username'], $client['email']);
      }
      return null;
    }
    
    return null;
  }

  static function getClient(PDO $db, ?int $user_id, ?string $username): ?Client
  {
    if ($user_id === null && $username === null) {
      return null;
    }

    if ($user_id !== null) {
      $query = "SELECT c.user_id, c.name as user_name, c.username, c.email, c.password, c.image_id, d.name as department_name, 
      CASE  WHEN ad.user_id IS NOT NULL THEN 'Admin' 
            WHEN a.user_id IS NOT NULL THEN 'Agent' 
            ELSE 'Client' 
      END AS role
      FROM Client c
      LEFT JOIN ClientDepartment cd ON c.user_id = cd.user_id
      LEFT JOIN Department d ON cd.department_id = d.department_id
      LEFT JOIN Agent a ON c.user_id = a.user_id
      LEFT JOIN Admin ad ON a.user_id = ad.user_id
      WHERE c.user_id = ?";

      $query = $db->prepare($query);
      $query->execute(array($user_id));
    } 
    
    else if ($username !== null) {
      $query = "SELECT c.user_id, c.name as user_name, c.username, c.email, c.password, c.image_id, d.name as department_name, 
      CASE  WHEN ad.user_id IS NOT NULL THEN 'Admin' 
            WHEN a.user_id IS NOT NULL THEN 'Agent' 
            ELSE 'Client' 
      END AS role
      FROM Client c
      LEFT JOIN ClientDepartment cd ON c.user_id = cd.user_id
      LEFT JOIN Department d ON cd.department_id = d.department_id
      LEFT JOIN Agent a ON c.user_id = a.user_id
      LEFT JOIN Admin ad ON a.user_id = ad.user_id
      WHERE lower(c.username) = ?";

      $query = $db->prepare($query);
      $query->execute(array(strtolower($username)));
    }

    $client = null;
    while ($row = $query->fetch()) {
      if ($client === null) {
        $client = new Client($row['user_id'], $row['user_name'], $row['username'], $row['email'], ($row['role'] == 'Agent' || $row['role'] == 'Admin'), $row['role'] == 'Admin', array($row['department_name']), $row['image_id']);
      } else {
        $client->departments[] = $row['department_name'];
      }
    }

    return $client;
  }

  static function getClients(PDO $db): array{
    $query = "Select c.user_id, c.name as user_name, c.username, c.email, c.password, c.image_id, d.name as department_name, 
              CASE  WHEN ad.user_id IS NOT NULL THEN 'Admin' 
                    WHEN a.user_id IS NOT NULL THEN 'Agent' 
                    ELSE 'Client' 
              END AS role
              FROM Client c
              LEFT JOIN ClientDepartment cd ON c.user_id = cd.user_id
              LEFT JOIN Department d ON cd.department_id = d.department_id
              LEFT JOIN Agent a ON c.user_id = a.user_id
              LEFT JOIN Admin ad ON a.user_id = ad.user_id;";
    
    $query = $db->prepare($query);
    $query->execute();

    $clients = array();
    while ($row = $query->fetch()) {
      if (!isset($clients[$row['user_id']])) {
        $clients[$row['user_id']] = new Client($row['user_id'], $row['user_name'], $row['username'], $row['email'], ($row['role'] == 'Agent' || $row['role'] == 'Admin'), $row['role'] == 'Admin', array($row['department_name']), $row['image_id']);
      } 
      else {
        $clients[$row['user_id']]->departments[] = $row['department_name'];
      }
    }

    return $clients;
  }

  function searchClients(PDO $db, MemberFilters $memberFilters): array{
    $subquery ="SELECT c.user_id, c.name as user_name, c.username, c.email, c.password, c.image_id, d.name as department_name, 
                CASE  WHEN ad.user_id IS NOT NULL THEN 'Admin' 
                      WHEN a.user_id IS NOT NULL THEN 'Agent' 
                      ELSE 'Client' 
                END AS role
                FROM Client c
                LEFT JOIN ClientDepartment cd ON c.user_id = cd.user_id
                LEFT JOIN Department d ON cd.department_id = d.department_id
                LEFT JOIN Agent a ON c.user_id = a.user_id
                LEFT JOIN Admin ad ON a.user_id = ad.user_id
                WHERE c.user_id != ?";

    $params = array($this->user_id);

    if ($memberFilters->department != "") {
      $subquery .= " AND department_name = ?";
      $params[] = $memberFilters->department;
    }

    if ($memberFilters->role != "") {
      if ($memberFilters->role == "Agent") {
        $subquery .= " AND role = 'Agent'";
      } else if ($memberFilters->role == "Admin") {
        $subquery .= " AND role = 'Admin'";
      } 
    }

    
    if ($memberFilters->search != "") {
      $subquery .= " AND (lower(user_name) LIKE ? OR lower(c.username) LIKE ?)";
      $params[] = "%" . strtolower($memberFilters->search) . "%";
      $params[] = "%" . strtolower($memberFilters->search) . "%";
    }

    if ($memberFilters->orderName != "") {
      $subquery .= " ORDER BY lower(user_name) " . $memberFilters->orderName;
    }

    if ($memberFilters->orderUsername != "") {
      if ($memberFilters->orderName == "") {
        $subquery .= " ORDER BY lower(c.username) " . $memberFilters->orderUsername;
      } else {
        $subquery .= ", lower(c.username) " . $memberFilters->orderUsername;
      }
    }

    if ($memberFilters->orderRole != "") {
      if ($memberFilters->orderName == "" && $memberFilters->orderUsername == "") {
        $subquery .= " ORDER BY lower(role) " . $memberFilters->orderRole;
      } else {
        $subquery .= ", lower(role) " . $memberFilters->orderRole;
      }
    }

    if ($memberFilters->orderDepartment != "") {
      if ($memberFilters->orderName == "" && $memberFilters->orderUsername == "" && $memberFilters->orderRole == "") {
        $subquery .= " ORDER BY lower(department_name) " . $memberFilters->orderDepartment;
      } else {
        $subquery .= ", lower(department_name) " . $memberFilters->orderDepartment;
      }
    }
    
    $query = $db->prepare($subquery);
    $query->execute($params);
    
    $clients = array();
    
    while ($client = $query->fetch()) {
      $clientExists = false;

      foreach ($clients as $c) {
        if ($c->user_id == $client['user_id']) {
          $clientExists = true;
          if (!in_array($client['department_name'], $c->departments)) {
            array_push($c->departments, $client['department_name']);
          }
          break;
        }
      }

      if (!$clientExists) {
        array_push($clients, new Client($client['user_id'], $client['user_name'], $client['username'], $client['email'], $client['role'] == 'Agent', $client['role'] == 'Admin', array($client['department_name']), $client['image_id'] ?? 1));
      }
    }

    return $clients;
  }

  function displayProfilePhoto(string $class){
    echo '<img src="../actions/displayPic.action.php?id=' . $this->image_id . '" alt="Profile Photo" class="' . $class . '">';
  }

  static function getAllAgents(PDO $db){
    $query = "SELECT c.user_id, c.name as user_name, c.username, c.email, c.password, c.image_id, d.name as department_name, 
    CASE  WHEN ad.user_id IS NOT NULL THEN 'Admin' 
          WHEN a.user_id IS NOT NULL THEN 'Agent' 
          ELSE 'Client' 
    END AS role
    FROM Client c
    LEFT JOIN ClientDepartment cd ON c.user_id = cd.user_id
    LEFT JOIN Department d ON cd.department_id = d.department_id
    LEFT JOIN Agent a ON c.user_id = a.user_id
    LEFT JOIN Admin ad ON a.user_id = ad.user_id
    WHERE a.user_id IS NOT NULL";

    $query = $db->prepare($query);
    $query->execute();

    $agents = array();
    while ($row = $query->fetch()) {
      if (!array_key_exists($row['user_id'], $agents)) {
        $agents[$row['user_id']] = new Client($row['user_id'], $row['user_name'], $row['username'], $row['email'], $row['role'] == 'Agent', $row['role'] == 'Admin', array($row['department_name']), $row['image_id']);
      } 
      else {
        $agents[$row['user_id']]->departments[] = $row['department_name'];
      }
    }

    return $agents;
  }

  function changeRole(PDO $db, string $role,){
    $currentRole = $this->isAgent ? 'Agent' : ($this->isAdmin ? 'Admin' : 'Client');

    switch ($role) {
      case 'Client':
        if($this->isAdmin){
          $query = "DELETE FROM Admin WHERE user_id = ?";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }

        if($this->isAgent){
          $query = "DELETE FROM Agent WHERE user_id = ?";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }
        break;

      case 'Agent':
        if($this->isAdmin){
          $query = "DELETE FROM Admin WHERE user_id = ?";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }

        if(!$this->isAgent){
          $query = "INSERT INTO Agent (user_id) VALUES (?)";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }

        break;

      case 'Admin':
        if(!$this->isAgent){
          $query = "INSERT INTO Agent (user_id) VALUES (?)";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }

        if(!$this->isAdmin){
          $query = "INSERT INTO Admin (user_id) VALUES (?)";
          $stmt = $db->prepare($query);
          $stmt->execute([$this->user_id]);
        }
        break;
    }
  }
}
?>