<?php
class Session{
  public function __construct(){
    session_start();
    
    if(!isset($_SESSION['csrf'])){
      $_SESSION['csrf'] = $this->generate_random_token();
    }
  }
  public function isLoggedIn(): bool{
    return isset($_SESSION['user_id']);
  }
  public function logout(){
    session_destroy();
  }
  public function getUserId(): ?int{
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
  }
  public function setUserId(int $user_id){
    $_SESSION['user_id'] = $user_id;
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
    return isset($_SESSION['duplicate_username']) ? $_SESSION['duplicate_username'] : false;
  }

  public function generate_random_token(){
    return bin2hex(openssl_random_pseudo_bytes(32));
  }
}
?>