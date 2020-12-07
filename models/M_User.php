<?php

class M_User{
  private $userName;
  private $userLogin;
  private $userId;
  private $userRole;

  public function login($login, $pass){
    $sql = "SELECT id_user, user_name, user_login, user_password FROM user WHERE user_login = :login";
    $arg = ['login' => $login];
    $passHash = md5($pass);
    $user = db::getRow($sql, $arg);

      $userId = $user['id_user'];
      $admin = db::getRow('SELECT * FROM user_role where id_user = :userId', ['userId' => $userId]);

    if ($user){
      if ($user['user_login'] == $login){
        if ($user['user_password'] == $passHash){
          $this->userName = $user['user_name'];
          $this->userLogin = $user['user_login'];
          $this->userId = $user['id_user'];
          $this->userRole = $admin['id_role'];
          return true;
        }
      }
    }    
    return false;
  }

  public function getId(){
    return $this->userId;
  }

  public function getLogin(){
    return $this->userLogin;
  }

  public function getName(){
    return $this->userName;
  }
  public function getRole(){
    return $this->userRole;
  }

  public function new($userName, $login, $password){
    $sql = "INSERT INTO user (user_name, user_login, user_password) VALUES (:name, :login, :password)";
    $arg = ['name' => $userName, 'login' => $login, 'password' => md5($password)];
    db::insert($sql, $arg);
  }


}
