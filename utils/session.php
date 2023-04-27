<?php
class Session{
  public function __construct(){
    session_start();
  }
  public function isLoggedIn(): bool{
    return isset($_SESSION['username']);
  }
  public function logout(){
    session_destroy();
  }
  public function getUsername(): ?string{
    return isset($_SESSION['username']) ? $_SESSION['username'] : null;
  }
  public function setUsername(string $username){
    $_SESSION['username'] = $username;
  }
  public function setFailedLogin(){
    $_SESSION['failed_login'] = true;
  }
  public function setSuccessLogin(){
    $_SESSION['failed_login'] = false;
  }
  public function getFailedLogin(): bool{
    return isset($_SESSION['failed_login']);
  }

  public function setDuplicateUsername(){
    $_SESSION['duplicate_username'] = true;
  }
  public function setSuccessRegister(){
    $_SESSION['duplicate_username'] = false;
  }
  public function getDuplicateUsername(): bool{
    return isset($_SESSION['duplicate_username']) ? $_SESSION['duplicate_username'] : false; //if null, return false
  }
}
?>