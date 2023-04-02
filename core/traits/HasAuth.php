<?php
namespace Core\Auth;

trait Authenticatable
{
  public function login($email, $password)
  {
    $user = $this->where('email', $email)->first();
    if (!$user) {
      return false;
    }

    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      return true;
    }

    return false;
  }

  public function logout()
  {
    unset($_SESSION['user']);
  }

  public function user()
  {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }

    return null;
  }

  public function check()
  {
    return isset($_SESSION['user']);
  }

  public function guest()
  {
    return !isset($_SESSION['user']);
  }
}