<?php
use Models\User;

class Auth
{
  public static function check()
  {
    return isset($_SESSION['user']);
  }
  public static function user()
  {
    return $_SESSION['user'];
  }
  public static function attempt($email, $password)
  {
    $user = User::where('email', $email)->first();
    if (!$user) {
      return false;
    }
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      return true;
    }
    return false;
  }
  public static function logout()
  {
    unset($_SESSION['user']);
  }
}